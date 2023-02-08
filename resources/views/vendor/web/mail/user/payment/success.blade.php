Dear {{ _value($data, "fname") }},

<p>
Thank you for booking your appointment with {{ env("APP_NAME") }}.
</p>
<p>
We will be happy to received you on {{ _value($data, "appointment_date") }}.
</p>
<p>
In the mean time a member of our team will get in touch with you if there is need for more information before
You arrive for your appointment.
</p>
<p>
Again, Thank you for your interest in what we do and we look forward to seeing you on the day of your appointment.
</p>

<p style="margin-bottom:40px">
    {{ env("APP_NAME") }}<br/>
    Online Team.
</p>
