<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class TemplateController extends Controller
{
    /**
     * Route slug to template filename map.
     *
     * @var array<string, string>
     */
    private const PAGE_MAP = [
        'home' => 'index.html',
        'about' => 'about.html',
        'products' => 'products.html',
        'product-detail' => 'product-detail.html',
        'catalogue' => 'catalogue.html',
        'cases' => 'cases.html',
        'case-detail' => 'case-detail.html',
        'news' => 'news.html',
        'news-detail' => 'news-detail.html',
        'contact' => 'contact.html',
    ];

    public function show(string $slug = 'home'): View
    {
        if (! isset(self::PAGE_MAP[$slug])) {
            abort(404);
        }

        $filePath = public_path('template/' . self::PAGE_MAP[$slug]);

        if (! is_file($filePath)) {
            abort(404, 'Template file not found.');
        }

        $html = file_get_contents($filePath);

        if ($html === false) {
            abort(500, 'Unable to load template file.');
        }

        preg_match('/<title>(.*?)<\/title>/is', $html, $titleMatches);
        $title = trim($titleMatches[1] ?? 'Ebonwindow');

        preg_match('/<body[^>]*>(.*)<\/body>/is', $html, $bodyMatches);
        $body = $bodyMatches[1] ?? '';

        // The master view loads the shared frontend script globally.
        $body = preg_replace('/<script\s+src="app\.js"[^>]*><\/script>/i', '', $body) ?? $body;

        $body = $this->replaceTemplateLinks($body);

        return view('template.layouts.master', [
            'title' => $title,
            'content' => $body,
        ]);
    }

    private function replaceTemplateLinks(string $html): string
    {
        $routeMap = [
            'index.html' => '/home',
            'about.html' => '/about',
            'products.html' => '/products',
            'product-detail.html' => '/product-detail',
            'catalogue.html' => '/catalogue',
            'cases.html' => '/cases',
            'case-detail.html' => '/case-detail',
            'news.html' => '/news',
            'news-detail.html' => '/news-detail',
            'contact.html' => '/contact',
        ];

        foreach ($routeMap as $file => $route) {
            $html = str_replace('href="' . $file . '"', 'href="' . $route . '"', $html);
            $html = str_replace("href='" . $file . "'", "href='" . $route . "'", $html);
            $html = str_replace('href="' . $file . '?', 'href="' . $route . '?', $html);
            $html = str_replace("href='" . $file . '?', "href='" . $route . '?', $html);
        }

        return $html;
    }
}
