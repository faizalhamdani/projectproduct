<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');

$routes->get('/product', 'ProductController::index');
$routes->get('/product/addProduct', 'ProductController::create');
$routes->post('/product/register', 'ProductController::register');
$routes->get('/product/confirmation', 'ProductController::confirmation');

$routes->get('/brand', 'BrandController::index');
$routes->get('/brand/addBrand', 'BrandController::addBrand');
$routes->post('/brand/saveBrand', 'BrandController::saveBrand');
$routes->get('/brand/editBrand/(:num)', 'BrandController::editBrand/$1');
$routes->post('/brand/updateBrand/(:num)', 'BrandController::updateBrand/$1');
$routes->get('/brand/deleteBrand/(:num)', 'BrandController::deleteBrand/$1');

$routes->get('/kategori', 'KategoriController::index');
$routes->get('/kategori/addKategori', 'KategoriController::addKategori');
$routes->post('/kategori/saveKategori', 'KategoriController::saveKategori');
$routes->get('/kategori/editKategori/(:num)', 'KategoriController::editKategori/$1');
$routes->post('/kategori/updateKategori/(:num)', 'KategoriController::updateKategori/$1');
$routes->post('/kategori/deleteKategori/(:num)', 'KategoriController::deleteKategori/$1');

$routes->get('/subkategori', 'SubkategoriController::index');
$routes->get('/subkategori/addSubkategori', 'SubkategoriController::addSubkategori');
$routes->post('/subkategori/saveSubkategori', 'SubkategoriController::saveSubkategori');
$routes->get('/subkategori/editSubkategori/(:num)', 'SubkategoriController::editSubkategori/$1');
$routes->post('/subkategori/updateSubkategori/(:num)', 'SubkategoriController::updateSubkategori/$1');
$routes->get('/subkategori/deleteSubkategori/(:num)', 'SubkategoriController::deleteSubkategori/$1');

$routes->get('/kapasitas', 'KapasitasController::index');
$routes->get('/kapasitas/addKapasitas', 'KapasitasController::addKapasitas');
$routes->post('/kapasitas/saveKapasitas', 'KapasitasController::saveKapasitas');
$routes->get('/kapasitas/editKapasitas/(:num)', 'KapasitasController::editKapasitas/$1');
$routes->post('/kapasitas/updateKapasitas/(:num)', 'KapasitasController::updateKapasitas/$1');
$routes->post('/kapasitas/deleteKapasitas/(:num)', 'KapasitasController::deleteKapasitas/$1');

$routes->get('/garansi_kompresor', 'GaransiKompresorController::index');
$routes->get('/garansi_kompresor/addGaransiKompresor', 'GaransiKompresorController::addGaransiKompresor');
$routes->post('/garansi_kompresor/saveGaransiKompresor', 'GaransiKompresorController::saveGaransiKompresor');
$routes->get('/garansi_kompresor/editGaransiKompresor/(:num)', 'GaransiKompresorController::editGaransiKompresor/$1');
$routes->post('/garansi_kompresor/updateGaransiKompresor/(:num)', 'GaransiKompresorController::updateGaransiKompresor/$1');
$routes->post('/garansi_kompresor/deleteGaransiKompresor/(:num)', 'GaransiKompresorController::deleteGaransiKompresor/$1');

$routes->get('/garansi_sparepart', 'GaransiSparepartController::index');
$routes->get('/garansi_sparepart/addGaransiSparepart', 'GaransiSparepartController::addGaransiSparepart');
$routes->post('/garansi_sparepart/saveGaransiSparepart', 'GaransiSparepartController::saveGaransiSparepart');
$routes->get('/garansi_sparepart/editGaransiSparepart/(:num)', 'GaransiSparepartController::editGaransiSparepart/$1');
$routes->post('/garansi_sparepart/updateGaransiSparepart/(:num)', 'GaransiSparepartController::updateGaransiSparepart/$1');
$routes->post('/garansi_sparepart/deleteGaransiSparepart/(:num)', 'GaransiSparepartController::deleteGaransiSparepart/$1');