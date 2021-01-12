<div class="form-group">
    <label for="exampleInputName1">Nama Project</label>
    <input type="text" name="name" value="{{ isset($data->name) ? $data->name : null }}" class="form-control" id="exampleInputName1" placeholder="Nama Project" />
</div> 

<div class="form-group">
    <label>File upload</label>
    <input type="file" name="file" class="form-control" /> 
</div> 