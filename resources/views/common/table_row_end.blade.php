<td class="row">
        <center>
            <div class="m-4" style="display: inline; width: 140px">
                <a href="{{ $edition_link . '/' . $data_id . '/edit' }}">
                    <button class="btn btn-outline-primary btn-sm me-2">Edit</button>
                </a>

                @include('common.link_begin', [
                    'method' => 'DELETE', 
                    'url' => $deletion_link . '/' . $data_id
                ])
                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                @include('common.link_end')
            </div>
        </center>
    </td>
</tr>