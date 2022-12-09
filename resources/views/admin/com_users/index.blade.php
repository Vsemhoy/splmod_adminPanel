<?php
use App\Http\Components\com_users\UsersController;

    $component = new UsersController();
?>

@extends('admin.template.default')

@section('page-breadcrumbs')
    {{ $component->RenderBreadcrumbs() }}
@endsection

@section('page-content')
<div class='section-data-control'>
    <div class='section-control-group'>
        <div class='control btn-default'>
            <button class='button'>BATON</button>
        </div>
        <div class='control btn-default'>
            <button class='button'>BATON</button>
        </div>
        <div class='control btn-default'>
            <button class='button'>BATON</button>
        </div>
        <div class='control btn-default'>
            <button class='button'>BATON</button>
        </div>
        <select>
            <option>Snow</option>
            <option>Sand</option>
            <option>Leafs</option>
            <option>Water</option>
        </select>
    </div>

    <div class='section-control-group'>
    <div class='control btn-default'>
        <input type='text' />
        <button class='button'>Send</button>
    </div>
        
    </div>

    <div class='section-control-group'>
        <div class='control btn-create'>
            <button class='button'>BRAND NEW</button>
        </div>
    </div>
</div>

{{ $component->RenderuserList_lastMonth() }}

@endsection

@section('component-sidebar')
  {{ $component->RenderMenu() }}
@endsection
