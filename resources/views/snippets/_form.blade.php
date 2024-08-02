<main class="w-full">
    <textarea
        id="editor"
        name="code">{{ optional($snippet ?? null)->code }}</textarea>
</main>

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