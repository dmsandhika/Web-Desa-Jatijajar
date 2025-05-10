<?php

namespace Database\Seeders;

use App\Models\ConfigSurat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfigSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $data = [
                [
                    'name' => 'Surat Keterangan Belum Nikah',
                    'value' => [
                        'NIK' => 'text',
                        'Nama' => 'text',
                        'Keperluan' => 'text',
                        'Foto Scan Ktp' => 'file',
                        'Foto Scan Kartu Keluarga' => 'file',
                        'No yang bisa dihubungi' => 'number',
                    ],
                ],[
                    'name' => 'Surat Keterangan Domisili',
                    'value' => [
                        'NIK' => 'text',
                        'Nama Lengkap' => 'text',
                        'Tempat Lahir' => 'text',
                        'Tanggal Lahir' => 'date',
                        'Jenis Kelamin' => [
                            'type' => 'radio',
                            'options' => ['Laki-Laki', 'Perempuan'],
                        ],
                        'Agama' => [
                            'type' => 'radio',
                            'options' => [
                                'Islam',
                                'Kristen Protestan',
                                'Katolik',
                                'Hindu',
                                'Buddha',
                                'Konghucu'
                            ],
                        ],
                        'Pekerjaan' => 'text',
                        'Alamat' => 'textarea',
                        'Keperluan' => 'text',
                        'Foto Scan KTP' => 'file',
                        'No yang bisa dihubungi' => 'number',
                    ]
                    ], [
                    'name' => 'Surat Keterangan Lahir',
                    'value' => [
                        'NIK Pemohon' => 'text',
                        'Nama Pemohon' => 'text',
                        'Nama Anak' => 'text',
                        'Keperluan' => 'text',
                        'No yang bisa dihubungi' => 'number',
                        'Scan Surat Keterangan Lahir dari RS Berstempel' => 'file',
                        'Scan KTP Ayah' => 'file',
                        'Scan KTP Ibu' => 'file',
                        'Scan Surat Nikah' => 'file',
                        'Scan KTP Saksi 1' => 'file',
                        'Scan KTP Saksi 2' => 'file',
                    ]
                ], [
                    'name' => 'Surat Keterangan Meninggal',
                    'value' => [
                        'NIK' => 'text',
                        'Nama' => 'text',
                        'Tanggal Meninggal' => 'date',
                        'Lokasi Meninggal' => 'text',
                        'Penyebab Meninggal' => 'text',
                        'Keperluan' => 'text',
                        'No yang bisa dihubungi' => 'number',
                        'Surat Keterangan Kematian Dari RS' => 'file',
                        'Scan KTP Saksi 1' => 'file',
                        'Scan KTP Saksi 2' => 'file',
                    ]
                    ], [
                        'name' => 'Surat Keterangan Tidak Mampu',
                        'value' => [
                            'NIK' => 'text',
                            'Nama' => 'text',
                            'Keperluan' => 'text',
                            'Foto Scan KK' => 'file',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ],[
                        'name' => 'Surat Keterangan Usaha',
                        'value' => [
                            'NIK' => 'text',
                            'Nama Lengkap' => 'text',
                            'Nama Usaha' => 'text',
                            'Tahun Berdiri' => 'number',
                            'Alamat Usaha' => 'textarea',
                            'Keperluan' => 'text',
                            'Foto Scan KTP' => 'file',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ], [
                        'name' => 'Surat Izin Keramaian',
                        'value' => [
                            'NIK' => 'text',
                            'Nama Lengkap' => 'text',
                            'Nama Acara' => 'text',
                            'Tanggal Mulai' => 'date',
                            'Tanggal Berakhir' => 'date',
                            'Jenis Hiburan' => 'text',
                            'Lokasi Acara' => 'textarea',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ], [
                        'name' => 'Surat Pengantar E-KTP',
                        'value' => [
                            'NIK' => 'text',
                            'Nama Lengkap' => 'text',
                            'Foto Scan KTP' => 'file',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ], [
                        'name' => 'Surat Pengantar SKCK',
                        'value' => [
                            'NIK' => 'text',
                            'Nama Lengkap' => 'text',
                            'Foto Scan KTP' => 'file',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ], [
                        'name' => 'Surat Keterangan Kehilangan',
                        'value' => [
                            'NIK' => 'text',
                            'Nama Lengkap' => 'text',
                            'Nama Barang/Dokumen' => 'text',
                            'Lokasi Kehilangan' => 'textarea',
                            'Foto Scan KTP' => 'file',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ], [
                        'name' => 'Surat Keterangan Penghasilan',
                        'value' => [
                            'NIK' => 'text',
                            'Nama Lengkap' => 'text',
                            'Nama Usaha' => 'text',
                            'Rata Rata Penghasilan Per Bulan' => 'number',
                            'Keperluan' => 'text',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ], [
                        'name' => 'Surat Rekomendasi',
                        'value' => [
                            'NIK' => 'text',
                            'Nama Lengkap' => 'text',
                            'Isi Rekomendasi' => 'textarea',
                            'Keperluan' => 'textarea',
                            'Foto Scan KK' => 'file',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ], [
                        'name' => 'Surat Permohonan Kuasa',
                        'value' => [
                            'NIK Pemberi Kuasa' => 'text',
                            'Nama Pemberi Kuasa' => 'text',
                            'Foto Scan KTP Pemberi Kuasa' => 'file',
                            'Isi Kuasa' => 'textarea',
                            'Nomor yang bisa dihubungi' => 'number',
                            'Foto Scan KTP Penerima Kuasa' => 'file',
                            'Hubungan dengan Penerima Kuasa' => 'text',
                        ]
                    ], [
                        'name' => 'Kartu Identitas Anak (KIA)',
                        'value' => [
                            'NIK Pemohon' => 'text',
                            'Nama Lengkap Pemohon' => 'text',
                            'Nama Anak' => 'text',
                            'Foto Scan Akta Lahir Anak' => 'file',
                            'Foto Scan KK' => 'file',
                            'Foto 4 x 6' => 'file',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ], [
                        'name' => 'Surat Pengantar Nikah',
                        'value' => [
                            'NIK Pemohon' => 'text',
                            'Nama Lengkap Pemohon' => 'text',
                            'Foto Scan KTP Pemohon' => 'file',
                            'Foto Scan KTP Ayah Pemohon' => 'file',
                            'Foto Scan KTP Ibu Pemohon' => 'file',
                            'Foto Scan KTP Calon' => 'file',
                            'Foto Scan KK Pemohon' => 'file',
                            'Foto Scan KK Calon' => 'file',
                            'Tanggal Nikah' => 'date',
                            'Foto Scan KTP Wali' => 'file',
                            'Status Wali di Keluarga' => 'text',
                            'No yang bisa dihubungi' => 'number',
                        ]
                    ]
        ];

        foreach ($data as $item) {
            ConfigSurat::create([
                'name' => $item['name'],
                'value' => json_encode($item['value'])
            ]);
        }
    }
}
