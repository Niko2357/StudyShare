<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Material;
use App\Models\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $dev1 = User::create([
            'username' => 'Admin Niki',
            'email' => 'polachova@spsejecna.cz',
            'school_name' => 'SPŠE Ječná',
            'grade_level' => '4. ročník',
            'role' => 'admin',
            'points' => 100,
            'bio' => 'Ahoj, spravuji tento web.',
        ]);

        $dev2 = User::create([
            'username' => 'Admin Anička',
            'email' => 'mickova@spsejecna.cz',
            'school_name' => 'SPŠE Ječná',
            'grade_level' => '4. ročník',
            'role' => 'admin',
            'points' => 100,
            'bio' => 'Ahoj, spravuji tento web.',
        ]);

        $student = User::create([
            'username' => 'Student Filip',
            'email' => 'pistek@spsejecna.cz',
            'school_name' => 'SPŠE Ječná',
            'grade_level' => '4. ročník',
            'role' => 'student',
            'points' => 0,
            'bio' => 'Ahoj, jsem student Filip.',
        ]);

        $student2 = User::create([
            'username' => 'Studentk Max',
            'email' => 'herich@spsejecna.cz',
            'school_name' => 'SPŠE Ječná',
            'grade_level' => '4. ročník',
            'role' => 'student',
            'points' => 0,
            'bio' => 'Ahoj, jsem student Max.',
        ]);

        $math = Subject::create(['name' => 'Matematika']);
        $programming = Subject::create(['name' => 'Informatika']);
        $czech = Subject::create(['name' => 'Český jazyk']);
        $english = Subject::create(['name' => 'Anglický jazyk']);
        $other_subjects = Subject::create(['name' => 'Ostatní předměty']);
        
        $cat_notes = Category::create(['name' => 'Poznámky']);
        $cat_presentations = Category::create(['name' => 'Prezentace']);
        $cat_tests = Category::create(['name' => 'Testy']);
        $cat_other = Category::create(['name' => 'Ostatní']);

        $m1 = Material::create([
            'title' => 'Matematika - Pravděpodobnost',
            'description' => 'Poznámky k pravděpodobnosti z matematiky.',
            'grade_level' => '4. ročník',
            'user_id' => $dev1->id,
            'subject_id' => $math->id,
            'category_id' => $cat_notes->id,
            'likes_count' => 0,
            'downloads_count' => 0,
            'tags' => 'pravděpodobnost,matematika,poznámky',
        ]);

        File::create([
            'material_id' => $m1->id,
            'file_name' => 'pravdepodobnost.pdf',
            'file_path' => 'http://localhost:8000/storage/fake/math.pdf',
            'file_type' => 'pdf',
            'file_size' => 1024,
        ]);

        $m2 = Material::create([
            'title' => 'Informatika - Databáze',
            'description' => 'Prezentace k databázím z informatiky.',
            'grade_level' => '4. ročník',
            'user_id' => $dev2->id,
            'subject_id' => $programming->id,
            'category_id' => $cat_presentations->id,
            'likes_count' => 0,
            'downloads_count' => 0,
            'tags' => 'databáze,informatika,prezentace',
        ]);

        File::create([
            'material_id' => $m2->id,
            'file_name' => 'databaze.pptx',
            'file_path' => 'http://localhost:8000/storage/fake/database.pptx',
            'file_type' => 'pptx',
            'file_size' => 2048,
        ]);

        $m3 = Material::create([
            'title' => 'Úvod do Laravelu',
            'description' => 'Základní příkazy a routování.',
            'grade_level' => '4. ročník',
            'user_id' => $dev1->id,
            'subject_id' => $programming->id,
            'category_id' => $cat_notes->id,
            'likes_count' => 100,
            'downloads_count' => 0,
            'tags' => 'laravel,informatika,poznámky',
        ]);
    }
}
