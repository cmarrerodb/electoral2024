<div class="form-group ml-3">
    <label >Nombre</label>
    <input type="text" name="name" id="" class="form-control" placeholder="Ingrese el nombre del rol">
    @error('name')
    <small class="text-danger">
        {{$$message}}
    </small>
    @enderror
</div>
<h2 class="h3">Listado de Permisos</h2>
@foreach ($permissions as $permission)
    <div>
        <input type="checkbox" name="permissions[]" id="{{$permission->id}}" class="mr-1">
        {{$permission->description}}
    </div>
@endforeach
