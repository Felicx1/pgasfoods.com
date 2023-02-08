Dear Admin,

<p>
    Below are the details of the enquiry.
</p>
<table>
    @php($data = (array) $data)

    @foreach($data as $key => $elem)
        <tr>
            <td>{{ $key }}</td>
            <td>{{ $elem }}</td>
        </tr>
    @endforeach
</table>
<p>
    Please, kindly follow up to confirm this.</p>

<p style="margin-bottom:40px">
    {{ env("APP_NAME") }}<br/>
    Online Team.
</p>
