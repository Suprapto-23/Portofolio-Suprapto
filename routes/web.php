<?php

use App\Models\AboutSection;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Experience;
use App\Models\HeroSection;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\SocialLink;
use App\Models\Technology;
use App\Models\Documentation;
use App\Models\Training;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| PRA TECHNOLOGY - Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Beranda (Home Landing Page)
Route::get('/', function () {
    $settings = SiteSetting::query()->get()->keyBy('key');
    $hero = HeroSection::query()->where('is_active', true)->orderBy('sort_order')->first();
    $about = AboutSection::query()->where('is_active', true)->orderBy('id')->first();
    $services = Service::query()->where('is_active', true)->orderBy('sort_order')->get();
    $experiences = Experience::query()->where('is_active', true)->orderBy('sort_order')->get();
    $educations = Education::query()->where('is_active', true)->orderBy('sort_order')->get();
    
    
    $skillCategories = SkillCategory::query()
        ->where('is_active', true)
        ->with(['skills' => function ($q) { 
            $q->where('is_active', true)->orderBy('sort_order'); 
        }])
        ->orderBy('sort_order')
        ->get();
        
    $skills = Skill::query()->where('is_active', true)->orderBy('sort_order')->get();
    $technologies = Technology::query()->where('is_active', true)->orderBy('sort_order')->get();
    
    // Mengambil semua project aktif, nanti dilimit 3 di file blade (Home)
    $projects = Project::query()->where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order')->get();
    
    $certifications = Certification::query()->where('is_active', true)->orderBy('sort_order')->get();
    $trainings = Training::query()->where('is_active', true)->orderBy('sort_order')->get();
    $socialLinks = SocialLink::query()->where('is_active', true)->orderBy('sort_order')->get();

    return view('pages.home', compact(
        'settings', 'hero', 'about', 'services', 'experiences', 'educations',
        'skillCategories', 'skills', 'technologies', 'projects', 'certifications', 'trainings', 'socialLinks'
    ));
})->name('home');


// 2. Halaman Profil Saya (About)
Route::get('/about', function () {
    $settings = SiteSetting::query()->get()->keyBy('key');
    $about = AboutSection::query()->where('is_active', true)->first();
    $educations = Education::query()->where('is_active', true)->orderBy('sort_order')->get();
    $experiences = Experience::query()->where('is_active', true)->orderBy('sort_order')->get();
    
    return view('pages.about', compact('settings', 'about', 'educations', 'experiences'));
})->name('about');


// 3. Halaman Layanan (Services)
Route::get('/services', function () {
    $settings = SiteSetting::query()->get()->keyBy('key');
    $services = Service::query()->where('is_active', true)->orderBy('sort_order')->get();
    
    return view('pages.services', compact('settings', 'services'));
})->name('services');


// 4. Halaman Portofolio/Proyek (Projects)
Route::get('/projects', function () {
    $settings = SiteSetting::query()->get()->keyBy('key');
    $projects = Project::query()->where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order')->get();
    
    return view('pages.projects', compact('settings', 'projects'));
})->name('projects');


// 5. Detail Proyek (Project Detail)
Route::get('/project/{project:slug}', function (Project $project) {
    abort_unless($project->is_active, 404);
    $settings = SiteSetting::query()->get()->keyBy('key');

    return view('pages.project-detail', compact('project', 'settings'));
})->name('projects.show');


// 6. Halaman Kontak (Contact)
Route::get('/contact', function () {
    $settings = SiteSetting::query()->get()->keyBy('key');

    return view('pages.contact', compact('settings'));
})->name('contact');

// 7. Halaman Dokumentasi
Route::get('/dokumentasi', function () {
    $settings = SiteSetting::query()->get()->keyBy('key');
    $docs = Documentation::query()->where('is_active', true)->latest()->get();

    return view('pages.dokumentasi', compact('settings', 'docs'));
})->name('dokumentasi');