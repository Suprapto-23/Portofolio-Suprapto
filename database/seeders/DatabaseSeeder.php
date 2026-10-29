<?php

namespace Database\Seeders;

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
use App\Models\Training;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | SITE SETTINGS
        |--------------------------------------------------------------------------
        */

        $settings = [
            [
                'key' => 'site_name',
                'value' => 'PRA Technology',
                'type' => 'text',
                'group' => 'general',
            ],
            [
                'key' => 'site_title',
                'value' => 'PRA Technology | Web Developer & Backend Developer',
                'type' => 'text',
                'group' => 'seo',
            ],
            [
                'key' => 'site_description',
                'value' => 'Portfolio profesional PRA Technology — Web Developer dan Backend Developer.',
                'type' => 'textarea',
                'group' => 'seo',
            ],
            [
                'key' => 'owner_name',
                'value' => 'Suprapto',
                'type' => 'text',
                'group' => 'profile',
            ],
            [
                'key' => 'email',
                'value' => 'ssuprapto351@gmail.com',
                'type' => 'email',
                'group' => 'contact',
            ],
            [
                'key' => 'phone',
                'value' => '081229952175',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'location',
                'value' => 'Bantarkulon, Lebakbarang, Kabupaten Pekalongan, Jawa Tengah',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'github',
                'value' => 'https://github.com/Suprapto-23',
                'type' => 'url',
                'group' => 'social',
            ],
            [
                'key' => 'logo',
                'value' => 'images/logo.png',
                'type' => 'image',
                'group' => 'branding',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        /*
        |--------------------------------------------------------------------------
        | HERO
        |--------------------------------------------------------------------------
        */

        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'badge' => 'WEB DEVELOPER & BACKEND DEVELOPER',
                'title' => 'Membangun Website & Sistem Digital',
                'highlighted_title' => 'yang Modern dan Terstruktur.',
                'description' => 'Saya membantu membangun aplikasi web dan sistem digital dengan fokus pada performa, struktur database, API, dan pengalaman pengguna.',
                'primary_button_text' => 'Lihat Project',
                'primary_button_url' => '#projects',
                'secondary_button_text' => 'Hubungi Saya',
                'secondary_button_url' => '#contact',
                'image' => 'images/hero/developer.png',
                'availability_text' => 'Available for opportunities',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | ABOUT
        |--------------------------------------------------------------------------
        */

        AboutSection::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'Tentang Saya',
                'subtitle' => 'Developer dengan fokus pada Web & Backend Development',
                'description' => 'Fresh graduate S1 Teknologi Informasi dengan pengalaman mengembangkan aplikasi web, sistem informasi, database relasional, REST API, dan integrasi layanan digital.',
                'second_description' => 'Saya memiliki ketertarikan untuk terus berkembang sebagai Fullstack Developer dengan menggabungkan kemampuan backend, frontend, database, deployment, dan teknologi modern.',
                'image' => 'images/profile/profile.png',
                'highlights' => [
                    'S1 Teknologi Informasi',
                    'IPK 3.76',
                    'Web Development',
                    'Backend Development',
                    'REST API',
                    'MySQL',
                ],
                'is_active' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */

        $services = [
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'short_description' => 'Pengembangan website modern, responsif, dan terstruktur.',
                'description' => 'Membangun website dan aplikasi web menggunakan teknologi modern dengan struktur kode yang rapi.',
                'icon' => 'code-2',
                'color' => 'blue',
                'features' => [
                    'Responsive Website',
                    'Laravel',
                    'PHP',
                    'HTML & CSS',
                    'Database Integration',
                ],
                'sort_order' => 1,
            ],
            [
                'title' => 'Backend Development',
                'slug' => 'backend-development',
                'short_description' => 'Backend, database, API, dan business logic.',
                'description' => 'Membangun backend aplikasi dengan database relasional, REST API, autentikasi, dan business logic.',
                'icon' => 'server',
                'color' => 'purple',
                'features' => [
                    'REST API',
                    'MySQL',
                    'PHP',
                    'Laravel',
                    'CRUD System',
                ],
                'sort_order' => 2,
            ],
            [
                'title' => 'System Information',
                'slug' => 'system-information',
                'short_description' => 'Sistem informasi untuk kebutuhan administrasi dan operasional.',
                'description' => 'Merancang dan membangun sistem informasi sesuai kebutuhan organisasi atau bisnis.',
                'icon' => 'database',
                'color' => 'cyan',
                'features' => [
                    'System Analysis',
                    'Database Design',
                    'Role Based Access',
                    'Reporting',
                    'Dashboard',
                ],
                'sort_order' => 3,
            ],
            [
                'title' => 'API Integration',
                'slug' => 'api-integration',
                'short_description' => 'Integrasi REST API dan layanan pihak ketiga.',
                'description' => 'Menghubungkan aplikasi dengan API dan layanan eksternal untuk memperluas fungsionalitas sistem.',
                'icon' => 'plug',
                'color' => 'indigo',
                'features' => [
                    'REST API',
                    'Third Party API',
                    'WhatsApp API',
                    'Authentication',
                    'Data Integration',
                ],
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                array_merge($service, [
                    'is_active' => true,
                ])
            );
        }

        /*
        |--------------------------------------------------------------------------
        | EXPERIENCE
        |--------------------------------------------------------------------------
        */

        Experience::updateOrCreate(
            [
                'company' => 'Lolong Adventure',
                'position' => 'Web Developer',
            ],
            [
                'location' => 'Pekalongan',
                'start_date' => '2025-02-01',
                'end_date' => '2025-06-30',
                'is_current' => false,
                'description' => 'Mengembangkan sistem pemesanan tiket online secara end-to-end.',
                'responsibilities' => [
                    'Merancang alur bisnis sistem pemesanan tiket.',
                    'Mengembangkan REST API.',
                    'Melakukan integrasi dengan partner.',
                    'Memberikan training dan support kepada partner.',
                    'Melakukan testing dan deployment.',
                ],
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        Experience::updateOrCreate(
            [
                'company' => 'Creatifla Multimedia',
                'position' => 'Backend Developer',
            ],
            [
                'location' => 'Pekalongan',
                'start_date' => '2025-01-01',
                'end_date' => '2025-02-28',
                'is_current' => false,
                'description' => 'Mengembangkan backend aplikasi menggunakan PHP Native dan MySQL.',
                'responsibilities' => [
                    'Merancang database relasional MySQL.',
                    'Mengembangkan CRUD dan dashboard laporan.',
                    'Mengintegrasikan WhatsApp Blast REST API.',
                    'Melakukan debugging dan testing.',
                ],
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | EDUCATION
        |--------------------------------------------------------------------------
        */

        Education::updateOrCreate(
            [
                'institution' => 'ITSNU Pekalongan',
                'degree' => 'S1',
            ],
            [
                'field_of_study' => 'Teknologi Informasi',
                'location' => 'Pekalongan',
                'start_year' => 2022,
                'end_year' => 2026,
                'gpa' => 3.76,
                'description' => 'Sarjana Teknologi Informasi.',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | SKILL CATEGORIES
        |--------------------------------------------------------------------------
        */

        $categories = [
            [
                'name' => 'Programming & Web',
                'slug' => 'programming-web',
                'sort_order' => 1,
            ],
            [
                'name' => 'Backend & Database',
                'slug' => 'backend-database',
                'sort_order' => 2,
            ],
            [
                'name' => 'Tools & Development',
                'slug' => 'tools-development',
                'sort_order' => 3,
            ],
        ];

        foreach ($categories as $category) {
            SkillCategory::updateOrCreate(
                ['slug' => $category['slug']],
                array_merge($category, [
                    'is_active' => true,
                ])
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SKILLS
        |--------------------------------------------------------------------------
        */

        $programming = SkillCategory::where('slug', 'programming-web')->first();
        $backend = SkillCategory::where('slug', 'backend-database')->first();
        $tools = SkillCategory::where('slug', 'tools-development')->first();

        $skills = [
            [
                'category' => $programming,
                'name' => 'Laravel',
                'slug' => 'laravel',
                'proficiency' => 90,
                'sort_order' => 1,
            ],
            [
                'category' => $programming,
                'name' => 'PHP',
                'slug' => 'php',
                'proficiency' => 90,
                'sort_order' => 2,
            ],
            [
                'category' => $programming,
                'name' => 'HTML & CSS',
                'slug' => 'html-css',
                'proficiency' => 90,
                'sort_order' => 3,
            ],
            [
                'category' => $backend,
                'name' => 'MySQL',
                'slug' => 'mysql',
                'proficiency' => 90,
                'sort_order' => 4,
            ],
            [
                'category' => $backend,
                'name' => 'REST API',
                'slug' => 'rest-api',
                'proficiency' => 85,
                'sort_order' => 5,
            ],
            [
                'category' => $tools,
                'name' => 'GitHub',
                'slug' => 'github',
                'proficiency' => 85,
                'sort_order' => 6,
            ],
            [
                'category' => $tools,
                'name' => 'System Administration',
                'slug' => 'system-administration',
                'proficiency' => 80,
                'sort_order' => 7,
            ],
            [
                'category' => $tools,
                'name' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'proficiency' => 75,
                'sort_order' => 8,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['slug' => $skill['slug']],
                [
                    'skill_category_id' => $skill['category']->id,
                    'name' => $skill['name'],
                    'proficiency' => $skill['proficiency'],
                    'sort_order' => $skill['sort_order'],
                    'is_active' => true,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | TECHNOLOGIES
        |--------------------------------------------------------------------------
        */

        $technologies = [
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'MySQL', 'slug' => 'mysql'],
            ['name' => 'HTML', 'slug' => 'html'],
            ['name' => 'CSS', 'slug' => 'css'],
            ['name' => 'JavaScript', 'slug' => 'javascript'],
            ['name' => 'GitHub', 'slug' => 'github'],
            ['name' => 'REST API', 'slug' => 'rest-api'],
        ];

        foreach ($technologies as $index => $technology) {
            Technology::updateOrCreate(
                ['slug' => $technology['slug']],
                [
                    'name' => $technology['name'],
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PROJECT 1
        |--------------------------------------------------------------------------
        */

        $project1 = Project::updateOrCreate(
            ['slug' => 'sistem-informasi-manajemen-posyandu'],
            [
                'title' => 'Sistem Informasi Manajemen Posyandu',
                'category' => 'Web Application',
                'role' => 'Fullstack Developer',
                'short_description' => 'Sistem informasi untuk membantu digitalisasi administrasi Posyandu.',
                'description' => 'Aplikasi berbasis Laravel dan MySQL untuk membantu pengelolaan administrasi Posyandu dengan akses berbasis role.',
                'image' => 'images/projects/posyandu.jpg',
                'status' => 'completed',
                'project_date' => '2026-01-01',
                'features' => [
                    'Role Based Access Control',
                    'Management Data',
                    'Dashboard',
                    'Reporting',
                    'MySQL Database',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | PROJECT 2
        |--------------------------------------------------------------------------
        */

        $project2 = Project::updateOrCreate(
            ['slug' => 'sistem-pakar-diagnosis-penyakit-sapi'],
            [
                'title' => 'Sistem Pakar Diagnosis Penyakit Sapi',
                'category' => 'Expert System',
                'role' => 'Web Developer',
                'short_description' => 'Sistem pakar untuk diagnosis penyakit sapi menggunakan Certainty Factor dan Forward Chaining.',
                'description' => 'Aplikasi Laravel yang membantu proses diagnosis penyakit sapi berdasarkan nilai kepastian dan menghasilkan rekomendasi tindakan.',
                'image' => 'images/projects/sistem-pakar.jpg',
                'status' => 'completed',
                'project_date' => '2025-01-01',
                'features' => [
                    'Certainty Factor',
                    'Forward Chaining',
                    'Diagnosis',
                    'Recommendation System',
                    'Laravel',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ]
        );

        $laravel = Technology::where('slug', 'laravel')->first();
        $php = Technology::where('slug', 'php')->first();
        $mysql = Technology::where('slug', 'mysql')->first();
        $html = Technology::where('slug', 'html')->first();
        $css = Technology::where('slug', 'css')->first();
        $api = Technology::where('slug', 'rest-api')->first();

        $project1->technologies()->sync([
            $laravel->id,
            $php->id,
            $mysql->id,
            $html->id,
            $css->id,
        ]);

        $project2->technologies()->sync([
            $laravel->id,
            $php->id,
            $mysql->id,
            $html->id,
            $css->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | CERTIFICATIONS
        |--------------------------------------------------------------------------
        */

        $certifications = [
            [
                'name' => 'Cybersecurity Risk Management in the Digital Era',
                'issuer' => 'ITSNU Pekalongan',
                'issued_at' => '2025-10-01',
            ],
            [
                'name' => 'Belajar Dasar AI',
                'issuer' => 'Dicoding',
                'issued_at' => '2025-09-01',
                'expires_at' => '2028-09-01',
            ],
            [
                'name' => 'Pemrograman Web (HTML & CSS)',
                'issuer' => 'HIMATIF ITSNU Pekalongan',
                'issued_at' => '2025-05-01',
            ],
        ];

        foreach ($certifications as $index => $certification) {
            Certification::updateOrCreate(
                [
                    'name' => $certification['name'],
                    'issuer' => $certification['issuer'],
                ],
                array_merge($certification, [
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ])
            );
        }

        /*
        |--------------------------------------------------------------------------
        | TRAINING
        |--------------------------------------------------------------------------
        */

        $trainings = [
            [
                'title' => 'Unlock Your Digital Potential with HTML and CSS',
                'provider' => 'HIMATIF ITSNU Pekalongan',
                'start_date' => '2025-05-01',
                'end_date' => '2025-05-31',
            ],
            [
                'title' => 'Pembuatan Desain Grafis',
                'provider' => 'BLKK PC GP Ansor Kabupaten Pekalongan',
                'start_date' => '2023-08-01',
                'end_date' => '2023-09-30',
            ],
        ];

        foreach ($trainings as $index => $training) {
            Training::updateOrCreate(
                [
                    'title' => $training['title'],
                    'provider' => $training['provider'],
                ],
                array_merge($training, [
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ])
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SOCIAL
        |--------------------------------------------------------------------------
        */

        SocialLink::updateOrCreate(
            ['platform' => 'github'],
            [
                'name' => 'GitHub',
                'url' => 'https://github.com/Suprapto-23',
                'icon' => 'github',
                'username' => 'Suprapto-23',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | DONE
        |--------------------------------------------------------------------------
        */

        $this->command->info('PRA Technology database seeder berhasil dijalankan.');
    }
}
