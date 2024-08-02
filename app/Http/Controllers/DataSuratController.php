<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat\KiaForm;
use App\Models\Surat\EktpForm;
use App\Models\Surat\SkckForm;
use App\Models\Surat\SktmForm;
use App\Models\Surat\KuasaForm;
use App\Models\Surat\LahirForm;
use App\Models\Surat\NikahForm;
use App\Models\Surat\UsahaForm;
use App\Models\Surat\DomisiliForm;
use Illuminate\Support\Facades\DB;
use App\Models\Surat\KeramaianForm;
use App\Models\Surat\MeninggalForm;
use App\Models\Surat\BelumnikahForm;
use App\Models\Surat\KehilanganForm;
use App\Models\Surat\PenghasilanForm;
use App\Models\Surat\RekomendasiForm;

class DataSuratController extends Controller
{
    public function index()
    {
        $belumNikah = BelumnikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Belum Nikah' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $domisili = DomisiliForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Domisili' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $lahir = LahirForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Lahir' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $meninggal = MeninggalForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Meninggal' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $sktm = SktmForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Tidak Mampu' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $usaha = UsahaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Usaha' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $ramai = KeramaianForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Izin Keramaian' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $ektp = EktpForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar E-Ktp' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $skck = SkckForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar SKCK' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $kehilangan = KehilanganForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Kehilangan' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $penghasilan = PenghasilanForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Penghasilan' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $rekomendasi = RekomendasiForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Rekomendasi' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $kuasa = KuasaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Permohonan Kuasa' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $kia = KiaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Kartu Identitas Anak' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $nikah = NikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar Nikah' as jenis_surat"),
            'created_at',
            'status'
        );
    
        $data = $belumNikah
                    ->union($domisili)
                    ->union($lahir)
                    ->union($meninggal)
                    ->union($sktm)
                    ->union($usaha)
                    ->union($ramai)
                    ->union($ektp)
                    ->union($skck)
                    ->union($kehilangan)
                    ->union($penghasilan)
                    ->union($rekomendasi)
                    ->union($kuasa)
                    ->union($kia)
                    ->union($nikah)
                    ->orderBy('created_at')
                    ->get();
    
        foreach ($data as $item) {
            if ($item->jenis_surat === 'Ket Domisili') {
                $item->detail_url = route('surat.domisili.detail', $item->id);
                $item->delete_url = route('surat.domisili.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Belum Nikah') {
                $item->detail_url = route('surat.belumnikah.detail', $item->id);
                $item->delete_url = route('surat.belumnikah.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Lahir') {
                $item->detail_url = route('surat.lahir.detail', $item->id);
                $item->delete_url = route('surat.lahir.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Meninggal') {
                $item->detail_url = route('surat.meninggal.detail', $item->id);
                $item->delete_url = route('surat.meninggal.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Tidak Mampu') {
                $item->detail_url = route('surat.sktm.detail', $item->id);
                $item->delete_url = route('surat.sktm.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Usaha') {
                $item->detail_url = route('surat.usaha.detail', $item->id);
                $item->delete_url = route('surat.usaha.delete', $item->id);
            } elseif ($item->jenis_surat === 'Izin Keramaian') {
                $item->detail_url = route('surat.keramaian.detail', $item->id);
                $item->delete_url = route('surat.keramaian.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar E-Ktp') {
                $item->detail_url = route('surat.ektp.detail', $item->id);
                $item->delete_url = route('surat.ektp.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar SKCK') {
                $item->detail_url = route('surat.skck.detail', $item->id);
                $item->delete_url = route('surat.skck.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Kehilangan') {
                $item->detail_url = route('surat.kehilangan.detail', $item->id);
                $item->delete_url = route('surat.kehilangan.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Penghasilan') {
                $item->detail_url = route('surat.penghasilan.detail', $item->id);
                $item->delete_url = route('surat.penghasilan.delete', $item->id);
            } elseif ($item->jenis_surat === 'Rekomendasi') {
                $item->detail_url = route('surat.rekomendasi.detail', $item->id);
                $item->delete_url = route('surat.rekomendasi.delete', $item->id);
            } elseif ($item->jenis_surat === 'Permohonan Kuasa') {
                $item->detail_url = route('surat.kuasa.detail', $item->id);
                $item->delete_url = route('surat.kuasa.delete', $item->id);
            } elseif ($item->jenis_surat === 'Kartu Identitas Anak') {
                $item->detail_url = route('surat.kia.detail', $item->id);
                $item->delete_url = route('surat.kia.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar Nikah') {
                $item->detail_url = route('surat.nikah.detail', $item->id);
                $item->delete_url = route('surat.nikah.delete', $item->id);
            }
        }
    
        $title = 'Data Surat';
    
        return view('admin.surat', compact('data', 'title'));
    }
    
    
    public function diajukan()
    {
        $belumNikah = BelumnikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Belum Nikah' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $domisili = DomisiliForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Domisili' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $lahir = LahirForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Lahir' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $meninggal = MeninggalForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Meninggal' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $sktm = SktmForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Tidak Mampu' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $usaha = UsahaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Usaha' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $ramai = KeramaianForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Izin Keramaian' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $ektp = EktpForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar E-Ktp' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $skck = SkckForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar SKCK' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $kehilangan = KehilanganForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Kehilangan' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $penghasilan = PenghasilanForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Penghasilan' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $rekomendasi = RekomendasiForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Rekomendasi' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $kuasa = KuasaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Permohonan Kuasa' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $kia = KiaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Kartu Identitas Anak' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $nikah = NikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar Nikah' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'diajukan');
    
        $data = $belumNikah
                    ->union($domisili)
                    ->union($lahir)
                    ->union($meninggal)
                    ->union($sktm)
                    ->union($usaha)
                    ->union($ramai)
                    ->union($ektp)
                    ->union($skck)
                    ->union($kehilangan)
                    ->union($penghasilan)
                    ->union($rekomendasi)
                    ->union($kuasa)
                    ->union($kia)
                    ->union($nikah)
                    ->orderBy('created_at')
                    ->get();
    
        foreach ($data as $item) {
            if ($item->jenis_surat === 'Ket Domisili') {
                $item->detail_url = route('surat.domisili.detail', $item->id);
                $item->delete_url = route('surat.domisili.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Belum Nikah') {
                $item->detail_url = route('surat.belumnikah.detail', $item->id);
                $item->delete_url = route('surat.belumnikah.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Lahir') {
                $item->detail_url = route('surat.lahir.detail', $item->id);
                $item->delete_url = route('surat.lahir.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Meninggal') {
                $item->detail_url = route('surat.meninggal.detail', $item->id);
                $item->delete_url = route('surat.meninggal.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Tidak Mampu') {
                $item->detail_url = route('surat.sktm.detail', $item->id);
                $item->delete_url = route('surat.sktm.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Usaha') {
                $item->detail_url = route('surat.usaha.detail', $item->id);
                $item->delete_url = route('surat.usaha.delete', $item->id);
            } elseif ($item->jenis_surat === 'Izin Keramaian') {
                $item->detail_url = route('surat.keramaian.detail', $item->id);
                $item->delete_url = route('surat.keramaian.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar E-Ktp') {
                $item->detail_url = route('surat.ektp.detail', $item->id);
                $item->delete_url = route('surat.ektp.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar SKCK') {
                $item->detail_url = route('surat.skck.detail', $item->id);
                $item->delete_url = route('surat.skck.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Kehilangan') {
                $item->detail_url = route('surat.kehilangan.detail', $item->id);
                $item->delete_url = route('surat.kehilangan.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Penghasilan') {
                $item->detail_url = route('surat.penghasilan.detail', $item->id);
                $item->delete_url = route('surat.penghasilan.delete', $item->id);
            } elseif ($item->jenis_surat === 'Rekomendasi') {
                $item->detail_url = route('surat.rekomendasi.detail', $item->id);
                $item->delete_url = route('surat.rekomendasi.delete', $item->id);
            } elseif ($item->jenis_surat === 'Permohonan Kuasa') {
                $item->detail_url = route('surat.kuasa.detail', $item->id);
                $item->delete_url = route('surat.kuasa.delete', $item->id);
            } elseif ($item->jenis_surat === 'Kartu Identitas Anak') {
                $item->detail_url = route('surat.kia.detail', $item->id);
                $item->delete_url = route('surat.kia.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar Nikah') {
                $item->detail_url = route('surat.nikah.detail', $item->id);
                $item->delete_url = route('surat.nikah.delete', $item->id);
            }
        }
    
        $title = 'Data Surat';
    
        return view('admin.surat', compact('data', 'title'));
    }
    public function ditolak()
    {
        $belumNikah = BelumnikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Belum Nikah' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $domisili = DomisiliForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Domisili' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $lahir = LahirForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Lahir' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $meninggal = MeninggalForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Meninggal' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $sktm = SktmForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Tidak Mampu' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $usaha = UsahaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Usaha' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $ramai = KeramaianForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Izin Keramaian' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $ektp = EktpForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar E-Ktp' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $skck = SkckForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar SKCK' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $kehilangan = KehilanganForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Kehilangan' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $penghasilan = PenghasilanForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Penghasilan' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $rekomendasi = RekomendasiForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Rekomendasi' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $kuasa = KuasaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Permohonan Kuasa' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $kia = KiaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Kartu Identitas Anak' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $nikah = NikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar Nikah' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'ditolak');
    
        $data = $belumNikah
                    ->union($domisili)
                    ->union($lahir)
                    ->union($meninggal)
                    ->union($sktm)
                    ->union($usaha)
                    ->union($ramai)
                    ->union($ektp)
                    ->union($skck)
                    ->union($kehilangan)
                    ->union($penghasilan)
                    ->union($rekomendasi)
                    ->union($kuasa)
                    ->union($kia)
                    ->union($nikah)
                    ->orderBy('created_at')
                    ->get();
    
        foreach ($data as $item) {
            if ($item->jenis_surat === 'Ket Domisili') {
                $item->detail_url = route('surat.domisili.detail', $item->id);
                $item->delete_url = route('surat.domisili.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Belum Nikah') {
                $item->detail_url = route('surat.belumnikah.detail', $item->id);
                $item->delete_url = route('surat.belumnikah.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Lahir') {
                $item->detail_url = route('surat.lahir.detail', $item->id);
                $item->delete_url = route('surat.lahir.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Meninggal') {
                $item->detail_url = route('surat.meninggal.detail', $item->id);
                $item->delete_url = route('surat.meninggal.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Tidak Mampu') {
                $item->detail_url = route('surat.sktm.detail', $item->id);
                $item->delete_url = route('surat.sktm.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Usaha') {
                $item->detail_url = route('surat.usaha.detail', $item->id);
                $item->delete_url = route('surat.usaha.delete', $item->id);
            } elseif ($item->jenis_surat === 'Izin Keramaian') {
                $item->detail_url = route('surat.keramaian.detail', $item->id);
                $item->delete_url = route('surat.keramaian.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar E-Ktp') {
                $item->detail_url = route('surat.ektp.detail', $item->id);
                $item->delete_url = route('surat.ektp.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar SKCK') {
                $item->detail_url = route('surat.skck.detail', $item->id);
                $item->delete_url = route('surat.skck.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Kehilangan') {
                $item->detail_url = route('surat.kehilangan.detail', $item->id);
                $item->delete_url = route('surat.kehilangan.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Penghasilan') {
                $item->detail_url = route('surat.penghasilan.detail', $item->id);
                $item->delete_url = route('surat.penghasilan.delete', $item->id);
            } elseif ($item->jenis_surat === 'Rekomendasi') {
                $item->detail_url = route('surat.rekomendasi.detail', $item->id);
                $item->delete_url = route('surat.rekomendasi.delete', $item->id);
            } elseif ($item->jenis_surat === 'Permohonan Kuasa') {
                $item->detail_url = route('surat.kuasa.detail', $item->id);
                $item->delete_url = route('surat.kuasa.delete', $item->id);
            } elseif ($item->jenis_surat === 'Kartu Identitas Anak') {
                $item->detail_url = route('surat.kia.detail', $item->id);
                $item->delete_url = route('surat.kia.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar Nikah') {
                $item->detail_url = route('surat.nikah.detail', $item->id);
                $item->delete_url = route('surat.nikah.delete', $item->id);
            }
        }
    
        $title = 'Data Surat';
    
        return view('admin.surat', compact('data', 'title'));
    }
    public function selesai()
    {
        $belumNikah = BelumnikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Belum Nikah' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $domisili = DomisiliForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Domisili' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $lahir = LahirForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Lahir' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $meninggal = MeninggalForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Meninggal' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $sktm = SktmForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Tidak Mampu' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $usaha = UsahaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Usaha' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $ramai = KeramaianForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Izin Keramaian' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $ektp = EktpForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar E-Ktp' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $skck = SkckForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar SKCK' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $kehilangan = KehilanganForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Kehilangan' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $penghasilan = PenghasilanForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Penghasilan' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $rekomendasi = RekomendasiForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Rekomendasi' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $kuasa = KuasaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Permohonan Kuasa' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $kia = KiaForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Kartu Identitas Anak' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $nikah = NikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Pengantar Nikah' as jenis_surat"),
            'created_at',
            'status'
        )->where('status', 'selesai');
    
        $data = $belumNikah
                    ->union($domisili)
                    ->union($lahir)
                    ->union($meninggal)
                    ->union($sktm)
                    ->union($usaha)
                    ->union($ramai)
                    ->union($ektp)
                    ->union($skck)
                    ->union($kehilangan)
                    ->union($penghasilan)
                    ->union($rekomendasi)
                    ->union($kuasa)
                    ->union($kia)
                    ->union($nikah)
                    ->orderBy('created_at')
                    ->get();
    
        foreach ($data as $item) {
            if ($item->jenis_surat === 'Ket Domisili') {
                $item->detail_url = route('surat.domisili.detail', $item->id);
                $item->delete_url = route('surat.domisili.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Belum Nikah') {
                $item->detail_url = route('surat.belumnikah.detail', $item->id);
                $item->delete_url = route('surat.belumnikah.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Lahir') {
                $item->detail_url = route('surat.lahir.detail', $item->id);
                $item->delete_url = route('surat.lahir.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Meninggal') {
                $item->detail_url = route('surat.meninggal.detail', $item->id);
                $item->delete_url = route('surat.meninggal.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Tidak Mampu') {
                $item->detail_url = route('surat.sktm.detail', $item->id);
                $item->delete_url = route('surat.sktm.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Usaha') {
                $item->detail_url = route('surat.usaha.detail', $item->id);
                $item->delete_url = route('surat.usaha.delete', $item->id);
            } elseif ($item->jenis_surat === 'Izin Keramaian') {
                $item->detail_url = route('surat.keramaian.detail', $item->id);
                $item->delete_url = route('surat.keramaian.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar E-Ktp') {
                $item->detail_url = route('surat.ektp.detail', $item->id);
                $item->delete_url = route('surat.ektp.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar SKCK') {
                $item->detail_url = route('surat.skck.detail', $item->id);
                $item->delete_url = route('surat.skck.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Kehilangan') {
                $item->detail_url = route('surat.kehilangan.detail', $item->id);
                $item->delete_url = route('surat.kehilangan.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Penghasilan') {
                $item->detail_url = route('surat.penghasilan.detail', $item->id);
                $item->delete_url = route('surat.penghasilan.delete', $item->id);
            } elseif ($item->jenis_surat === 'Rekomendasi') {
                $item->detail_url = route('surat.rekomendasi.detail', $item->id);
                $item->delete_url = route('surat.rekomendasi.delete', $item->id);
            } elseif ($item->jenis_surat === 'Permohonan Kuasa') {
                $item->detail_url = route('surat.kuasa.detail', $item->id);
                $item->delete_url = route('surat.kuasa.delete', $item->id);
            } elseif ($item->jenis_surat === 'Kartu Identitas Anak') {
                $item->detail_url = route('surat.kia.detail', $item->id);
                $item->delete_url = route('surat.kia.delete', $item->id);
            } elseif ($item->jenis_surat === 'Pengantar Nikah') {
                $item->detail_url = route('surat.nikah.detail', $item->id);
                $item->delete_url = route('surat.nikah.delete', $item->id);
            }
        }
    
        $title = 'Data Surat';
    
        return view('admin.surat', compact('data', 'title'));
    }

    public function search(Request $request)
    {

        $search = $request->input('search');
        $data = collect();

        if ($search) {

            $belumNikah = BelumnikahForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Belum Nikah' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");

            $domisili = DomisiliForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Domisili' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $lahir = LahirForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Lahir' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $meninggal = MeninggalForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Meninggal' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $sktm = SktmForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Tidak Mampu' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $usaha = UsahaForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Usaha' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $ramai = KeramaianForm::select(
                'nik',
                'nama',
                DB::raw("'Izin Keramaian' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $ektp = EktpForm::select(
                'nik',
                'nama',
                DB::raw("'Pengantar E-Ktp' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $skck = SkckForm::select(
                'nik',
                'nama',
                DB::raw("'Pengantar SKCK' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $kehilangan = KehilanganForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Kehilangan' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $penghasilan = PenghasilanForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Penghasilan' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $rekomendasi = RekomendasiForm::select(
                'nik',
                'nama',
                DB::raw("'Rekomendasi' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $kuasa = KuasaForm::select(
                'nik',
                'nama',
                DB::raw("'Permohonan Kuasa' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $kia = KiaForm::select(
                'nik',
                'nama',
                DB::raw("'Kartu Identitas Anak' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            
            $nikah = NikahForm::select(
                'nik',
                'nama',
                DB::raw("'Pengantar Nikah' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");
            

            // Gabungkan ketiga query dengan union
            $data = $belumNikah
                        ->union($domisili)
                        ->union($lahir)
                        ->union($meninggal)
                        ->union($sktm)
                        ->union($usaha)
                        ->union($ramai)
                        ->union($ektp)
                        ->union($skck)
                        ->union($kehilangan)
                        ->union($penghasilan)
                        ->union($rekomendasi)
                        ->union($kuasa)
                        ->union($kia)
                        ->union($nikah)
                        ->orderBy('created_at')
                        ->get();
        }

        $title = 'Pelacakan Surat';

        return view('surat.lacak', compact('data', 'title'));
    }
    public function count()
    {
        $domisiliDiajukan = DomisiliForm::where('status', 'diajukan')->count();
        $belumNikahDiajukan = BelumnikahForm::where('status', 'diajukan')->count();
        $lahirDiajukan = LahirForm::where('status', 'diajukan')->count();
        $meninggalDiajukan = MeninggalForm::where('status', 'diajukan')->count();
        $sktmDiajukan = SktmForm::where('status', 'diajukan')->count();
        $usahaDiajukan = UsahaForm::where('status', 'diajukan')->count();
        $keramaianDiajukan = KeramaianForm::where('status', 'diajukan')->count();
        $ektpDiajukan = EktpForm::where('status', 'diajukan')->count();
        $skckDiajukan = SkckForm::where('status', 'diajukan')->count();
        $kehilanganDiajukan = KehilanganForm::where('status', 'diajukan')->count();
        $penghasilanDiajukan = PenghasilanForm::where('status', 'diajukan')->count();
        $rekomendasiDiajukan = RekomendasiForm::where('status', 'diajukan')->count();
        $kuasaDiajukan = KuasaForm::where('status', 'diajukan')->count();
        $kiaDiajukan = KiaForm::where('status', 'diajukan')->count();
        $nikahDiajukan = NikahForm::where('status', 'diajukan')->count();
    
        $domisiliTotal = DomisiliForm::count();
        $belumNikahTotal = BelumnikahForm::count();
        $lahirTotal = LahirForm::count();
        $meninggalTotal = MeninggalForm::count();
        $sktmTotal = SktmForm::count();
        $usahaTotal = UsahaForm::count();
        $keramaianTotal = KeramaianForm::count();
        $ektpTotal = EktpForm::count();
        $skckTotal = SkckForm::count();
        $kehilanganTotal = KehilanganForm::count();
        $penghasilanTotal = PenghasilanForm::count();
        $rekomendasiTotal = RekomendasiForm::count();
        $kuasaTotal = KuasaForm::count();
        $kiaTotal = KiaForm::count();
        $nikahTotal = NikahForm::count();
    
        $totalSuratDiajukan = $domisiliDiajukan + $belumNikahDiajukan + $lahirDiajukan + $meninggalDiajukan + $sktmDiajukan + $usahaDiajukan + $keramaianDiajukan + $ektpDiajukan + $skckDiajukan + $kehilanganDiajukan + $penghasilanDiajukan + $rekomendasiDiajukan + $kuasaDiajukan + $kiaDiajukan + $nikahDiajukan;
        $totalSurat = $domisiliTotal + $belumNikahTotal + $lahirTotal + $meninggalTotal + $sktmTotal + $usahaTotal + $keramaianTotal + $ektpTotal + $skckTotal + $kehilanganTotal + $penghasilanTotal + $rekomendasiTotal + $kuasaTotal + $kiaTotal + $nikahTotal;
    
        return response()->json([
            'totalSuratDiajukan' => $totalSuratDiajukan,
            'totalSurat' => $totalSurat,
        ]);
    }
    

}
