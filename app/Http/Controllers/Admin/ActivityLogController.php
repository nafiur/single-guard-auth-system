<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ActivityLog::with(['causer', 'subject'])->select('activity_log.*');

            if ($request->filled('log_name')) {
                $query->where('log_name', $request->log_name);
            }

            if ($request->filled('event')) {
                $query->where('event', $request->event);
            }

            return \Yajra\DataTables\Facades\DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('log_name', function ($row) {
                    $class = $row->log_name == 'admin' ? 'primary' : ($row->log_name == 'user' ? 'success' : 'secondary');

                    return '<span class="badge bg-label-'.$class.'">'.ucfirst($row->log_name).'</span>';
                })
                ->editColumn('event', function ($row) {
                    $class = $row->event == 'deleted' ? 'danger' : ($row->event == 'updated' ? 'warning' : 'success');

                    return '<span class="text-'.$class.' fw-medium">'.ucfirst($row->event).'</span>';
                })
                ->editColumn('description', function ($row) {
                    return \Illuminate\Support\Str::limit($row->description, 30);
                })
                ->addColumn('causer', function ($row) {
                    if ($row->causer) {
                        return '
                            <div class="d-flex flex-column">
                                <span class="fw-medium text-body">'.($row->causer->name ?? $row->causer->username).'</span>
                                <small class="text-muted">'.class_basename($row->causer_type).' (ID: '.$row->causer_id.')</small>
                            </div>';
                    }

                    return '<span class="text-muted italic">System</span>';
                })
                ->addColumn('subject', function ($row) {
                    $properties = $row->properties ?? [];
                    $name = data_get($properties, 'attributes.name', data_get($properties, 'old.name', data_get($properties, 'attributes.label', data_get($properties, 'old.label'))));
                    if (is_array($name)) {
                        $name = Arr::first(Arr::flatten($name));
                    }

                    $subjectName = $row->subject ? ($row->subject->name ?? ($row->subject->label ?? ($row->subject->username ?? 'N/A'))) : ($name ?? 'N/A');
                    $subjectType = $row->subject_type ? class_basename($row->subject_type) : 'System';
                    $class = $row->subject ? 'text-muted' : 'text-danger';
                    $deleted = $row->subject ? '' : '(Deleted) ';

                    return '
                        <div class="d-flex flex-column">
                            <span class="fw-medium text-body">'.$subjectName.'</span>
                            <small class="'.$class.'">'.$subjectType.' '.$deleted.'(ID: '.($row->subject_id ?? 'N/A').')</small>
                        </div>';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('M d, H:i:s');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('admin.activity-logs.show', $row->id).'" class="btn btn-sm btn-icon"><i class="bx bx-show"></i></a>';
                })
                ->rawColumns(['log_name', 'event', 'causer', 'subject', 'action'])
                ->make(true);
        }

        $logNames = ActivityLog::distinct()->pluck('log_name');
        $events = ActivityLog::distinct()->whereNotNull('event')->pluck('event');

        return view('admin.activity-logs.index', compact('logNames', 'events'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityLog $activityLog)
    {
        return view('admin.activity-logs.show', compact('activityLog'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityLog $activityLog)
    {
        $activityLog->delete();

        return redirect()->route('admin.activity-logs.index')
            ->with('success', 'Activity log deleted successfully.');
    }
}
