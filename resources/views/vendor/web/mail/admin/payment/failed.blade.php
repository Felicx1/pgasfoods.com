Dear Admin,

<p>
    A booking just failed while processing the payment. Please, kindly verify and follow up if necessary.
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

<p style="margin-bottom:40px">
    {{ env("APP_NAME") }}<br/>
    Online Team.
</p>
