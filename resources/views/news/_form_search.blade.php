<div class="well">

    <h4>Search</h4>
    <form method="GET" action="{{ URL('/search/') }}">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                            <input class="btn" type="submit" value="Search">
                        </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>