<script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/file-upload.js')}}"></script>

<script src="{{asset('backend/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('backend/vendors/select2/select2.min.js')}}"></script>

<script src="{{asset('backend/js/typeahead.js')}}"></script>
<script src="{{asset('backend/js/select2.js')}}"></script>

<script src="https://cdn.tiny.cloud/1/l0kyhmhr3j87etbqgv81wcc6ys584vze1h8eotar46lm9as9/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'powerpaste advcode table lists checklist markdown',
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
   });
</script>

