<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ideation - BMC Generator')</title>
    
    <!-- Bootstrap CSS with fallback -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
          onerror="this.onerror=null;this.href='{{ asset('assets/css/bootstrap.min.css') }}';">
    
    <!-- FontAwesome CSS with fallback -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"
          onerror="this.onerror=null;this.href='{{ asset('assets/css/fontawesome.min.css') }}';">
    
    <!-- Additional CSS -->
    @yield('styles')
</head>
