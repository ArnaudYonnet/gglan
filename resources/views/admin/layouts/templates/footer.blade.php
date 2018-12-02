<footer class="main-footer">
    <div class="pull-right hidden-xs">
        {{ config('app.version') }}
    </div>
    <strong>Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} <a href="/"> {{ env('APP_NAME') }} </a>.</strong> All rights reserved.
</footer>   