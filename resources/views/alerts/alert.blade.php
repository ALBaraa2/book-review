@if(session('message'))
    <div class="alert alert-success bg-green-50 border-l-4 border-green-400 p-4 text-green-700 rounded-md shadow-sm flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span>{{ session('message') }}</span>
    </div>
    <script>
        // Auto-dismiss the alert after 5 seconds
        setTimeout(() => {
            document.querySelector('.alert-success').style.display = 'none';
        }, 5000); // 5000 milliseconds = 5 seconds
    </script>
@endif

@if(session('success'))
    <div class="alert alert-success bg-green-50 border-l-4 border-green-400 p-4 text-green-700 rounded-md shadow-sm flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.alert-success').style.display = 'none';
        }, 5000);
    </script>
@endif
