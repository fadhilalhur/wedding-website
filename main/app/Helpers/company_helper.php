<?php
use App\Models\CompanyModel;
if (!function_exists('get_company_logo')) {
    function get_company_logo()
    {
        $companyModel = new CompanyModel();
        $company = $companyModel->first();
        return $company && $company['logo'] ? base_url($company['logo']) : base_url('assets/img/default-logo.png');
    }
}
if (!function_exists('get_company_name')) {
    function get_company_name()
    {
        $companyModel = new CompanyModel();
        $company = $companyModel->first();
        return $company && $company['name'] ? $company['name'] : 'Nama Rumah Sakit';
    }
}
function tanggalIndo($date) {
  $bulan = [
    1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  ];
  $tgl = date('Y-m-d H:i', strtotime($date));
  $split = explode('-', date('Y-m-d', strtotime($tgl)));
  $jam = date('H:i', strtotime($tgl));
  return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0] . ' ' . $jam;
}
