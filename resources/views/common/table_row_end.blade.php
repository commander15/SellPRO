    <td class="row" style="width: 50px">
        <center class="">
            <a href="{{ $edition_link . '/' . $id }}">
                <button class="btn btn-outline-primary btn-sm me-4">Edit</button>
            </a>

            @include('common.link_begin', [
                'id' => 1, 
                'method' => 'DELETE', 
                'url' => $deletion_link . '/' . $id
            ])
                <button class="btn btn-outline-danger btn-sm">Delete</button>
            @include('common.link_end')
        </center>
    </td>
</tr>