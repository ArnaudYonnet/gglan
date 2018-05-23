<footer class="footer bg-light">
    <div class="container text-white text-center">
        <i class="far fa-copyright"></i>
        {{ config('app.name') }} | {{ \Carbon\Carbon::now()->format('Y') }}
    </div>
</footer>