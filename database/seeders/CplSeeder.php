<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CplSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpl')->insert([
            // kurikulum 2020
            // PS 1
            ['id_cpl' => 1, 'id_kurikulum' => 1, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu menganalisis kebutuhan rekayasa', 'desc_cpl_en' => 'Able to analyze engineering needs'],
            ['id_cpl' => 2, 'id_kurikulum' => 1, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu merancang sistem teknik', 'desc_cpl_en' => 'Able to design engineering systems'],
            ['id_cpl' => 3, 'id_kurikulum' => 1, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu menggunakan perangkat teknik modern', 'desc_cpl_en' => 'Able to use modern engineering tools'],

            // PS 2
            ['id_cpl' => 4, 'id_kurikulum' => 2, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengevaluasi proses pertambangan', 'desc_cpl_en' => 'Able to evaluate mining processes'],
            ['id_cpl' => 5, 'id_kurikulum' => 2, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengelola keselamatan tambang', 'desc_cpl_en' => 'Able to manage mine safety'],
            ['id_cpl' => 6, 'id_kurikulum' => 2, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengoperasikan alat berat tambang', 'desc_cpl_en' => 'Able to operate heavy mining equipment'],

            // PS 3
            ['id_cpl' => 7, 'id_kurikulum' => 3, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu merancang sistem mekanis', 'desc_cpl_en' => 'Able to design mechanical systems'],
            ['id_cpl' => 8, 'id_kurikulum' => 3, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu melakukan analisis termodinamika', 'desc_cpl_en' => 'Able to perform thermodynamic analysis'],
            ['id_cpl' => 9, 'id_kurikulum' => 3, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu menggunakan software teknik mesin', 'desc_cpl_en' => 'Able to use mechanical engineering software'],

            // PS 4
            ['id_cpl' => 10, 'id_kurikulum' => 4, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu mengelola limbah secara berkelanjutan', 'desc_cpl_en' => 'Able to manage waste sustainably'],
            ['id_cpl' => 11, 'id_kurikulum' => 4, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu menerapkan teknologi pengolahan air', 'desc_cpl_en' => 'Able to apply water treatment technology'],
            ['id_cpl' => 12, 'id_kurikulum' => 4, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu melakukan audit lingkungan', 'desc_cpl_en' => 'Able to conduct environmental audits'],

            // PS 5
            ['id_cpl' => 13, 'id_kurikulum' => 5, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu mendesain bangunan yang estetis dan fungsional', 'desc_cpl_en' => 'Able to design aesthetic and functional buildings'],
            ['id_cpl' => 14, 'id_kurikulum' => 5, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu mengintegrasikan nilai budaya dalam desain', 'desc_cpl_en' => 'Able to integrate cultural values in design'],
            ['id_cpl' => 15, 'id_kurikulum' => 5, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu menggunakan perangkat lunak arsitektur', 'desc_cpl_en' => 'Able to use architectural software'],

            // PS 6
            ['id_cpl' => 16, 'id_kurikulum' => 6, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu menganalisis proses reaksi kimia', 'desc_cpl_en' => 'Able to analyze chemical reaction processes'],
            ['id_cpl' => 17, 'id_kurikulum' => 6, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu mengoperasikan alat industri kimia', 'desc_cpl_en' => 'Able to operate chemical industry equipment'],
            ['id_cpl' => 18, 'id_kurikulum' => 6, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu merancang instalasi kimia', 'desc_cpl_en' => 'Able to design chemical installations'],

            // PS 7
            ['id_cpl' => 19, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu membangun aplikasi perangkat lunak', 'desc_cpl_en' => 'Able to build software applications'],
            ['id_cpl' => 20, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengelola data secara efisien', 'desc_cpl_en' => 'Able to manage data efficiently'],
            ['id_cpl' => 21, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan kecerdasan buatan', 'desc_cpl_en' => 'Able to apply artificial intelligence'],
            ['id_cpl' => 22, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-4', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu membangun aplikasi perangkat lunak', 'desc_cpl_en' => 'Able to build software applications'],
            ['id_cpl' => 23, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-5', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengelola data secara efisien', 'desc_cpl_en' => 'Able to manage data efficiently'],
            ['id_cpl' => 24, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-6', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan kecerdasan buatan', 'desc_cpl_en' => 'Able to apply artificial intelligence'],

            // PS 8
            ['id_cpl' => 25, 'id_kurikulum' => 8, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu merancang sistem kontrol elektronik', 'desc_cpl_en' => 'Able to design electronic control systems'],
            ['id_cpl' => 26, 'id_kurikulum' => 8, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu melakukan analisis sinyal digital', 'desc_cpl_en' => 'Able to perform digital signal analysis'],
            ['id_cpl' => 27, 'id_kurikulum' => 8, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu menggunakan mikrokontroler dalam sistem', 'desc_cpl_en' => 'Able to use microcontrollers in systems'],

            // PS 9
            ['id_cpl' => 28, 'id_kurikulum' => 9, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu melakukan pemetaan geologi', 'desc_cpl_en' => 'Able to perform geological mapping'],
            ['id_cpl' => 29, 'id_kurikulum' => 9, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu menganalisis struktur batuan', 'desc_cpl_en' => 'Able to analyze rock structures'],
            ['id_cpl' => 30, 'id_kurikulum' => 9, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu melakukan interpretasi data geofisika', 'desc_cpl_en' => 'Able to interpret geophysical data'],
       

            // kurikulum 2025
            // PS 1
            ['id_cpl' => 31, 'id_kurikulum' => 10, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 1, 'desc_cpl_id' => '(2025)Mampu menganalisis kebutuhan rekayasa', 'desc_cpl_en' => '(2025)Able to analyze engineering needs'],
            ['id_cpl' => 32, 'id_kurikulum' => 10, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 1, 'desc_cpl_id' => '(2025)Mampu merancang sistem teknik', 'desc_cpl_en' => '(2025)Able to design engineering systems'],
            ['id_cpl' => 33, 'id_kurikulum' => 10, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 1, 'desc_cpl_id' => '(2025)Mampu menggunakan perangkat teknik modern', 'desc_cpl_en' => '(2025)Able to use modern engineering tools'],

            // PS 2
            ['id_cpl' => 34, 'id_kurikulum' => 11, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 2, 'desc_cpl_id' => '(2025)Mampu mengevaluasi proses pertambangan', 'desc_cpl_en' => '(2025)Able to evaluate mining processes'],
            ['id_cpl' => 35, 'id_kurikulum' => 11, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 2, 'desc_cpl_id' => '(2025)Mampu mengelola keselamatan tambang', 'desc_cpl_en' => '(2025)Able to manage mine safety'],
            ['id_cpl' => 36, 'id_kurikulum' => 11, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 2, 'desc_cpl_id' => '(2025)Mampu mengoperasikan alat berat tambang', 'desc_cpl_en' => '(2025)Able to operate heavy mining equipment'],

            // PS 3
            ['id_cpl' => 37, 'id_kurikulum' => 12, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 3, 'desc_cpl_id' => '(2025)Mampu merancang sistem mekanis', 'desc_cpl_en' => '(2025)Able to design mechanical systems'],
            ['id_cpl' => 38, 'id_kurikulum' => 12, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 3, 'desc_cpl_id' => '(2025)Mampu melakukan analisis termodinamika', 'desc_cpl_en' => '(2025)Able to perform thermodynamic analysis'],
            ['id_cpl' => 39, 'id_kurikulum' => 12, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 3, 'desc_cpl_id' => '(2025)Mampu menggunakan software teknik mesin', 'desc_cpl_en' => '(2025)Able to use mechanical engineering software'],

            // PS 4
            ['id_cpl' => 40, 'id_kurikulum' => 13, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 4, 'desc_cpl_id' => '(2025)Mampu mengelola limbah secara berkelanjutan', 'desc_cpl_en' => '(2025)Able to manage waste sustainably'],
            ['id_cpl' => 41, 'id_kurikulum' => 13, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 4, 'desc_cpl_id' => '(2025)Mampu menerapkan teknologi pengolahan air', 'desc_cpl_en' => '(2025)Able to apply water treatment technology'],
            ['id_cpl' => 42, 'id_kurikulum' => 13, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 4, 'desc_cpl_id' => '(2025)Mampu melakukan audit lingkungan', 'desc_cpl_en' => '(2025)Able to conduct environmental audits'],

            // PS 5
            ['id_cpl' => 43, 'id_kurikulum' => 14, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 5, 'desc_cpl_id' => '(2025)Mampu mendesain bangunan yang estetis dan fungsional', 'desc_cpl_en' => '(2025)Able to design aesthetic and functional buildings'],
            ['id_cpl' => 44, 'id_kurikulum' => 14, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 5, 'desc_cpl_id' => '(2025)Mampu mengintegrasikan nilai budaya dalam desain', 'desc_cpl_en' => '(2025)Able to integrate cultural values in design'],
            ['id_cpl' => 45, 'id_kurikulum' => 14, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 5, 'desc_cpl_id' => '(2025)Mampu menggunakan perangkat lunak arsitektur', 'desc_cpl_en' => '(2025)Able to use architectural software'],

            // PS 6
            ['id_cpl' => 46, 'id_kurikulum' => 15, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 6, 'desc_cpl_id' => '(2025)Mampu menganalisis proses reaksi kimia', 'desc_cpl_en' => '(2025)Able to analyze chemical reaction processes'],
            ['id_cpl' => 47, 'id_kurikulum' => 15, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 6, 'desc_cpl_id' => '(2025)Mampu mengoperasikan alat industri kimia', 'desc_cpl_en' => '(2025)Able to operate chemical industry equipment'],
            ['id_cpl' => 48, 'id_kurikulum' => 15, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 6, 'desc_cpl_id' => '(2025)Mampu merancang instalasi kimia', 'desc_cpl_en' => '(2025)Able to design chemical installations'],

            // PS 7
            ['id_cpl' => 49, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu membangun aplikasi perangkat lunak', 'desc_cpl_en' => '(2025)Able to build software applications'],
            ['id_cpl' => 50, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu mengelola data secara efisien', 'desc_cpl_en' => '(2025)Able to manage data efficiently'],
            ['id_cpl' => 51, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu menerapkan kecerdasan buatan', 'desc_cpl_en' => '(2025)Able to apply artificial intelligence'],
            ['id_cpl' => 52, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-4', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu membangun aplikasi perangkat lunak', 'desc_cpl_en' => '(2025)Able to build software applications'],
            ['id_cpl' => 53, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-5', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu mengelola data secara efisien', 'desc_cpl_en' => '(2025)Able to manage data efficiently'],
            ['id_cpl' => 54, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-6', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu menerapkan kecerdasan buatan', 'desc_cpl_en' => '(2025)Able to apply artificial intelligence'],

            // PS 8
            ['id_cpl' => 55, 'id_kurikulum' => 17, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 8, 'desc_cpl_id' => '(2025)Mampu merancang sistem kontrol elektronik', 'desc_cpl_en' => '(2025)Able to design electronic control systems'],
            ['id_cpl' => 56, 'id_kurikulum' => 17, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 8, 'desc_cpl_id' => '(2025)Mampu melakukan analisis sinyal digital', 'desc_cpl_en' => '(2025)Able to perform digital signal analysis'],
            ['id_cpl' => 57, 'id_kurikulum' => 17, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 8, 'desc_cpl_id' => '(2025)Mampu menggunakan mikrokontroler dalam sistem', 'desc_cpl_en' => '(2025)Able to use microcontrollers in systems'],

            // PS 9
            ['id_cpl' => 58, 'id_kurikulum' => 18, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 9, 'desc_cpl_id' => '(2025)Mampu melakukan pemetaan geologi', 'desc_cpl_en' => '(2025)Able to perform geological mapping'],
            ['id_cpl' => 59, 'id_kurikulum' => 18, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 9, 'desc_cpl_id' => '(2025)Mampu menganalisis struktur batuan', 'desc_cpl_en' => '(2025)Able to analyze rock structures'],
            ['id_cpl' => 60, 'id_kurikulum' => 18, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 9, 'desc_cpl_id' => '(2025)Mampu melakukan interpretasi data geofisika', 'desc_cpl_en' => '(2025)Able to interpret geophysical data'],
       
       
       
        ]);
    }
}