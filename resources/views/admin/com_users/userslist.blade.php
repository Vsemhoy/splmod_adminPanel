<?php
use App\Http\Components\com_users\UsersController;

    $component = new UsersController();
?>
@extends('admin.template.default')

@section('page-breadcrumbs')
    {{ $component->RenderBreadcrumbs() }}
@endsection

@section('page-content')
<form method="get" target='{{ route("admin.users.userlist") }}'>
<div class='section-data-control'>
    <div class='section-control-group'>


        <!-- <div class="control btn-default">
            <button class="button">BATON</button>
        </div> -->
        <div class="control btn-default">
            <select name='state' class="button" onchange="this.form.submit()">
                <option value="">Все</option>
                <?php
                foreach (UsersController::$userStates AS $key => $value)
                {
                    $selected = "";
                    if ($component->stateToShow != null && $component->stateToShow == $key) {
                        $selected = "selected";
                    };
                    echo "<option value='" . $key . "' " . $selected . ">" . $value . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="control btn-default">
            <select name='count' class="button" onchange="this.form.submit()">
            <?php
                foreach (UsersController::$countValues AS $value)
                {
                    $selected = "";
                    if ($component->countToShow ==$value) {
                        $selected = "selected";
                    };
                    echo "<option value='" . $value . "' " . $selected . ">" . $value . "</option>";
                };
                ?>
            </select>
        </div>
        <div class='control btn-default'>
            <input name='text' type='text' 
            title='Поиск по имени, почте, описанию, компании, логину'
            value='<?php echo $component->textToShow; ?>'/>
            <button type="submin" class='button'>Поиск</button>
        </div>

    </div>
    
    <div class='section-control-group'>

    </div>


    
    <div class='section-control-group'>
        <a class='control btn-create' href='{{ route("admin.users.usereditor") }}'>
            <button name="def" class='button' type="button" title='Добавить пользователя'><span uk-icon="plus-circle"></span></button>
        </a>
    </div>
</div>

<div class='section-data-control'>
    <div class='section-control-group'>

    </div>
    
    <div class='section-control-group'>
        <div class='control btn-default'>
            <button class='button' type="button"><a href="<?php
            $ppg = $component->pageNumber - 1;
            if ($ppg == 0){ $ppg = 1;};
            echo route("admin.users.userlist") . "?page=" . $ppg . "&state=" . $component->stateToShow . "&count=" . $component->countToShow. "&text=" . $component->textToShow;
            ?>
            " uk-icon="icon: chevron-left"></a></button>
            <button class='button' type="button"><a href="<?php
            echo route("admin.users.userlist") . "?page=" . 1 . "&state=" . $component->stateToShow . "&count=" . $component->countToShow. "&text=" . $component->textToShow;
            ?>" uk-icon="icon: chevron-double-left"></a></button>
            <span class='control-text'>Страница 
                <?php echo $component->pageNumber; ?> из 
                <?php echo $component->totalPages; ?>
            </span>
            <button class='button' type="button"><a href="<?php

            echo route("admin.users.userlist") . "?page=" . $component->totalPages . "&state=" . $component->stateToShow. "&count=" . $component->countToShow. "&text=" . $component->textToShow;
            ?>" uk-icon="icon: chevron-double-right"></a></button>
            <button class='button' type="button"><a href="<?php
                        $ppg = $component->pageNumber + 1;
                        if ($ppg == $component->totalPages + 1){
                            $ppg = $component->totalPages;
                        }
            echo route("admin.users.userlist") . "?page=" . $ppg . "&state=" . $component->stateToShow. "&count=" . $component->countToShow. "&text=" . $component->textToShow;
            ?>" uk-icon="icon: chevron-right"></a></button>
        </div>
    </div>
    
    <div class='section-control-group'>
    </div>
</div>
</form>

{{ $component->RenderUserList() }}

@endsection

@section('component-sidebar')
  {{ $component->RenderMenu() }}
@endsection