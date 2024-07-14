<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\Guru;
use App\Models\Pengumuman;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678'),
            'roles'=>'ADMIN'
        ]);

        Profile::create([
            'title' => 'Profil Sekolah',
            'image' => 'img/example-image.jpg',
            'logo' => 'img/pngwing.png',
            'sejarah' => 'SMP IT Insan Qur’ani Poncowarno merupakan sekolah yang terletak di Jalan Raya Poncowarno, Gang IQ, Kecamatan Kalirejo, Kabupaten Lampung Tengah. SMP ini merupakan Sekolah Memenengah Pertama yang mengintegrasikan kurikulum umum dengan pendidikan agama Islam. Mereka fokus pada pengembangan akademis dan moral siswa dengan pendekatan holistik. Kurikulumnya mencakup mata pelajaran umum seperti matematika, ilmu pengetahuan, dan bahasa, sambil memberikan penekanan pada nilai-nilai Islam dan pembelajaran Al-Qur\'an sehingga fokusnya tidak hanya pada prestasi akademis saja tetapi juga pada pengembangan karakter dan moral siswa sesuai ajaran islam.',
            'visi' => 'Terwujudnya generasi muslim yang kuat aqidah, taat ibadah, berakhlaq karimah, sehat jasmani, unggul dalam penguasaan ilmu pengetahuan dan teknologi serta mampu bersaing secara global.',
            'misi' => json_encode([
                'Meningkatkan kualitas keimanan dan ketaqwaan kepada Allah SWT.',
                'Menyelenggarakan pembelajaran dan bimbingan secara efektif.',
                'Mengembangkan potensi akademik dan non-akademik peserta didik.',
                'Menumbuhkan penghayatan terhadap ajaran agama Islam.',
            ]),
            'lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.6101336375837!2d104.97173207498236!3d-5.1662499948111265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e474ba1afb2027d%3A0x6960ee703ece99a7!2sSMPIT%20INSAN%20QUR&#39;ANI%20PONCOWARNO!5e0!3m2!1sid!2sid!4v1718976455217!5m2!1sid!2sid',
        ]);

        Guru::create([
            'nama' => 'John Doe',
            'nip' => '1234567890',
            'email' => 'johndoe@example.com',
            'telp' => '081234567890',
            'alamat' => 'Jl. Kebon Jeruk No. 123',
            'tanggal_lahir' => '1980-01-01',
            'foto' => 'john_doe.jpg',
        ]);

        Pengumuman::create([
            'tittle' => 'Penerimaan Peserta didik baru',
            'isi' => 'Silahkan unduh form pendaftaran di bawah ini:',
            'lampiran' => 'Form.pdf',
        ]);

        Event::create([
            'tittle' => 'Contoh Judul',
            'content' => 'Contoh Paragraf Content...',
            'foto'=> 'dsfsdfss.jpg'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
