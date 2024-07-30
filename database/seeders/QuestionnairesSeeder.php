<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            // Pertanyaan Informatika
            ['question' => 'Seberapa sering Anda melakukan coding atau pemrograman?', 'major' => 'informatika'],
            ['question' => 'Apakah Anda menikmati bekerja dengan database dan manajemen data?', 'major' => 'informatika'],
            ['question' => 'Seberapa tertarik Anda pada pengembangan dan analisis sistem jaringan?', 'major' => 'informatika'],
            ['question' => 'Apakah Anda tertarik pada desain dan pengembangan perangkat lunak?', 'major' => 'informatika'],
            ['question' => 'Seberapa sering Anda mengikuti perkembangan teknologi informasi terbaru?', 'major' => 'informatika'],
            ['question' => 'Seberapa tertarik Anda pada analisis data dan data mining?', 'major' => 'informatika'],
            ['question' => 'Seberapa sering Anda terlibat dalam proyek pengembangan sistem informasi?', 'major' => 'informatika'],
            ['question' => 'Apakah Anda menikmati memecahkan masalah teknis yang kompleks?', 'major' => 'informatika'],
            ['question' => 'Seberapa tertarik Anda pada keamanan informasi dan jaringan?', 'major' => 'informatika'],
            ['question' => 'Seberapa sering Anda menggunakan alat atau perangkat lunak untuk pengembangan aplikasi?', 'major' => 'informatika'],

            // Pertanyaan Sistem Informasi
            ['question' => 'Apakah Anda menikmati bekerja dalam tim untuk mengembangkan solusi teknologi?', 'major' => 'sistem_informasi'],
            ['question' => 'Seberapa tertarik Anda pada pengembangan aplikasi mobile?', 'major' => 'sistem_informasi'],
            ['question' => 'Seberapa sering Anda membaca artikel atau buku tentang teknologi?', 'major' => 'sistem_informasi'],
            ['question' => 'Apakah Anda memiliki pengalaman dalam menggunakan alat pengembangan perangkat lunak (seperti Git, Docker)?', 'major' => 'sistem_informasi'],
            ['question' => 'Seberapa tertarik Anda pada pengembangan dan manajemen proyek TI?', 'major' => 'sistem_informasi'],
            ['question' => 'Seberapa sering Anda mengikuti kursus atau pelatihan terkait teknologi informasi?', 'major' => 'sistem_informasi'],
            ['question' => 'Apakah Anda menikmati melakukan analisis terhadap kebutuhan bisnis dan bagaimana teknologi dapat memenuhinya?', 'major' => 'sistem_informasi'],
            ['question' => 'Seberapa tertarik Anda pada cloud computing dan layanan terkait?', 'major' => 'sistem_informasi'],
            ['question' => 'Seberapa sering Anda terlibat dalam kegiatan hacking etis atau pengujian keamanan?', 'major' => 'sistem_informasi'],
            ['question' => 'Apakah Anda menikmati bekerja dengan teknologi AI dan machine learning?', 'major' => 'sistem_informasi'],

            // Pertanyaan Teknologi Informasi
            ['question' => 'Seberapa tertarik Anda pada arsitektur jaringan komputer?', 'major' => 'teknologi_informasi'],
            ['question' => 'Seberapa sering Anda menggunakan teknologi virtualisasi seperti VMware atau VirtualBox?', 'major' => 'teknologi_informasi'],
            ['question' => 'Apakah Anda tertarik pada perencanaan dan implementasi sistem TI?', 'major' => 'teknologi_informasi'],
            ['question' => 'Seberapa sering Anda mengikuti perkembangan dalam keamanan siber?', 'major' => 'teknologi_informasi'],
            ['question' => 'Seberapa tertarik Anda pada administrasi sistem dan jaringan?', 'major' => 'teknologi_informasi'],
            ['question' => 'Seberapa sering Anda menggunakan perangkat IoT (Internet of Things) dalam proyek Anda?', 'major' => 'teknologi_informasi'],
            ['question' => 'Apakah Anda menikmati bekerja dengan big data dan analitik?', 'major' => 'teknologi_informasi'],
            ['question' => 'Seberapa tertarik Anda pada teknologi blockchain dan aplikasi terkait?', 'major' => 'teknologi_informasi'],
            ['question' => 'Seberapa sering Anda berpartisipasi dalam hackathon atau kompetisi pemrograman?', 'major' => 'teknologi_informasi'],
            ['question' => 'Seberapa sering Anda mengikuti pelatihan atau seminar tentang administrasi jaringan?', 'major' => 'teknologi_informasi']
        ];

        DB::table('questionnaires')->insert($questions);
    }
}
