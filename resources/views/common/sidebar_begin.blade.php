<?php
    $groups = array();

    $group = array(
        'name' => 'CORE',
        'items' => [
            'name' => 'Dashboard'
        ]
    );

    $group = array(
        'name' => '',
        'items' => [
            ''
        ]
    );
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @include('common.sidebar_group_begin', [ 'title' => 'Core' ])
                        @include('common.sidebar_item', [ 'ficon' => 'tachometer-alt', 'title' => 'Dashboard', 'link' => '/dashboard', 'active' => ($view_id == 'dashboard') ])
                        @include('common.sidebar_item', [ 'ficon' => 'table', 'title' => 'Sellers', 'link' => '/sellers', 'active' => ($view_id == 'sellers') ])
                        @include('common.sidebar_item', [ 'ficon' => 'table', 'title' => 'Products', 'link' => '/products', 'active' => ($view_id == 'products') ])
                        @include('common.sidebar_item', [ 'ficon' => 'table', 'title' => 'Customers', 'link' => '/customers', 'active' => ($view_id == 'customers') ])
                        @include('common.sidebar_item', [ 'ficon' => 'table', 'title' => 'Sales', 'link' => '/sales', 'active' => ($view_id == 'sales') ])
                    @include('common.sidebar_group_end')
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <span style="font-weight: bold">{{ Auth::user()->name }}</span>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">