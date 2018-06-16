<div class="col-md-4 position-absolute tips-block text-center">
    @if (session('status'))
        <div class="alert alert-success message-tips">
            {{ session('status') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success message-tips">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger message-tips">
            {{ session('error') }}
        </div>
    @endif
    @if (session('info'))
        <div class="alert alert-info message-tips">
            {{ session('info') }}
        </div>
    @endif
</div>

