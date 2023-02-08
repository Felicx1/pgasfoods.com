Dear {{ _value($data, "fname") }},

<p>
    Thank you for booking your appointment with {{ env("APP_NAME") }}.
</p>
<p>
    We are unable to book your appointment for the selected date. This could be due to some many reasons.
</p>
<p>
    Please, kindly try again or contact us on {{ env("APP_MAIL_PHONE") }} or at {{ env("APP_MAIL_CONTACT") }}
    and our support team will be happy to help.
</p>
<p>
    A member of our team will get in touch with your as soon as we confirm your appointment booking.
</p>
<p>
    Again, Thank you for your interest in what we do.
</p>

<p style="margin-bottom:40px">
    {{ env("APP_NAME") }}<br/>
    Online Team.
</p>
