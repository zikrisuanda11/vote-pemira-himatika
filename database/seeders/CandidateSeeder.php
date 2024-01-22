<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidate::create([
            'name' => 'M. Rafi Firdaus & Fachriza Azima',
            'vision' => '"Mewujudkan HIMATIKA yang berkompeten, berwawasan luas dan menjadi wadah bagi mahasiwa Informatika untuk berkarya dan berprestasi"',
            'mission' => 'Membentuk mahasiswa Informatika berjiwa enterpreneurship 
                Berperan aktif dalam kemajuan teknologi informasi dan komunikasi di Indonesia
                Meningkatkan kepedulian mahasiswa Informatika terhadap lingkungan dan masyarakat',
            'candidate_image' => '/assets/candidate_image/WdRReDZ23td00geNAHECDSokbgFVNTx3OmS9WJFQ.png'
        ]);
        Candidate::create([
            'name' => 'Fadillah Paula & Timotius Agustio Ananda Prasetyo',
            'vision' => '"Pemimpin terbesar belum tentu orang yang melakukan hal-hal terbesar. Dialah yang membuat orang melakukan hal-hal terbesar."',
            'mission' => 'Selamat berproses dan berjuang calon pemimpin.',
            'candidate_image' => '/assets/candidate_image/63xHXRmDtn2cEntgRyRQ9RDuRRxap524fCaOWSWN.png'
        ]);
        Candidate::create([
            'name' => 'M. Dimas Zulvian & Bryan Al-Raihan',
            'vision' => '"Menjadikan Himatika Universitas mulia sebagai himpunan yang Produktif, Kreatif, Aspiratif, dan Berintegritas"',
            'mission' => 'Mewujudkan naungan yang Inspiratif dan Aspiratif bagi Mahasiswa Informatika Universitas mulia.
                Menjadikan lingkungan yang Komunikatif dan Kolaboratif agar mengasah kemampuan bekerja dalam tim pada setiap anggota.
                Memperluas relasi dan menjaga komunikasi antar anggota serta menerapkan sistem kerja yang efektif dan produktif.',
            'candidate_image' => '/assets/candidate_image/UmOVCd8O4MEXUMocju1VgZqw18uqFIaPUwb7Z5nN.png'
        ]);
    }
}
