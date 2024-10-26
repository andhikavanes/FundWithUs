<!-- resources/views/about.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    .about-section {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fc;
        padding: 50px 0;
    }
    .about-container {
        display: flex;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
        align-items: center;
        justify-content: space-between;
    }
    .about-text {
        flex: 1;
        padding: 20px;
    }
    .about-text h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .about-text p {
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    .about-image {
        flex: 1;
        padding: 20px;
    }
    .about-image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }
</style>

<div class="about-section">
    <div class="about-container">
        <div class="about-image">
            <img src="https://www.fhcamps.com/wp-content/uploads/FH-Blog-Volunteer.jpg" alt="About Us Image">
        </div>
        <div class="about-text">
            <h1>About Us</h1>
            <p>Welcome to FundWithUs, your trusted platform for fundraising and charitable giving. We are dedicated to connecting compassionate individuals and organizations with those in need, creating a community where every act of kindness counts.</p>
            <p>Our mission is to empower individuals and communities to support humanitarian efforts across the globe. We believe that by harnessing the power of collective generosity, we can make a tangible difference in the lives of those affected by disasters, conflicts, and other challenging circumstances.</p>
            <p>At FundWithUs, we facilitate fundraising campaigns for a wide range of causes, including natural disaster relief, medical aid, education support, environmental conservation, and more. We provide a secure and transparent platform where donors can contribute to verified campaigns, ensuring their donations reach those who need them most.</p>
        </div>
    </div>
</div>
@endsection
