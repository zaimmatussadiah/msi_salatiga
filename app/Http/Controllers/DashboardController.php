<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Member;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Masoudi\Laravel\Visitors\Models\Visitor;

class DashboardController extends Controller
{

    public function Dashboard()
    {

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $visiCount = visitors()->range($startOfMonth, $endOfMonth)->count();
        $visitors = Visitor::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('COUNT(*) as total_visitors')
        )
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('day')
            ->orderBy('day', 'asc')
            ->get();

        $daysInMonth = [];
        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            $daysInMonth[$date->format('j')] = 0;
        }

        // Fill in the visitor data
        foreach ($visitors as $visitor) {
            $daysInMonth[$visitor->day] = $visitor->total_visitors;
        }

        $visiMounth = [
            'labels' => array_keys($daysInMonth),
            'data' => array_values($daysInMonth),
        ];

        $slugs = Visitor::select(DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(path, 'berita/', -1), '/', 1) as slug"))
            ->where('path', 'like', '%berita/%')
            ->groupBy('slug')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get()
            ->pluck('slug');

        $topVisitedPosts = [];

        foreach ($slugs as $slug) {
            $post = Post::where('slug', $slug)->first();
            if ($post) {
                $topVisitedPosts[] = $post;
            }
        }
        // dd($topVisitedPosts);

        $messages = Message::all();
        $posts = Post::all();
        $members = Member::all();
        return view('admin.dashboard', compact('messages', 'posts', 'members', 'visiMounth', 'visiCount', 'topVisitedPosts'));
    }
}
