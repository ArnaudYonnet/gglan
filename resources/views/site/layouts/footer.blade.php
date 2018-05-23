<footer class="footer bg-dark">
    <div class="container text-white text-center">
        <i class="far fa-copyright"></i>
        {{ config('app.name') }} | {{ \Carbon\Carbon::now()->format('Y') }}
    </div>
</footer>