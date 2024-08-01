<div class="flex border-l-2 border-indigo-500">
    <main class="w-full">
        <textarea
            id="editor"
            name="code">{{ optional($snippet ?? null)->code }}</textarea>
    </main>

    <div class="min-w-40">
        <div class="p-4">
            <h3 class="font-semibold uppercase mb-8">Explorer</h3>

            <div>
                <input 
                    type="submit" 
                    value="{{ $buttonText ?? 'Submit' }}"
                    class="bg-indigo-500 text-indigo-50 w-full py-1 text-xs uppercase cursor-pointer"
                >
            </div>
        </div>
    </div>
</div>

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/material-darker.min.css">

<style>
    .CodeMirror {
        height: 100vh;
        font-size: 14px;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/addon/display/placeholder.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/clike/clike.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/php/php.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const codeEditor = CodeMirror.fromTextArea(document.getElementById('editor'), {
            lineNumbers: true,
            mode: 'application/x-httpd-php',
            theme: 'material-darker',
            placeholder: '// ...',
            lineWrapping: true,
            scrollbarStyle: null,
        });
    })
</script>
@endsection