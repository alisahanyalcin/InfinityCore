<h1>
    Welcome to
    {% if name %}
    {{name}}
    {% endif %}
</h1>
<p>
    {% for record in records %}
        <br> > {{record.name}}:{{record.email}}
    {% else %}
        No users have been found.
    {% endfor %}
</p>