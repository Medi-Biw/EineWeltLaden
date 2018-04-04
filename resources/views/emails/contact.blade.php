<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Kontaktanfrage</title>
</head>
<body>
<div>
	<span><strong>Neue Kontaktanfrage</strong></span>
	<div>
		Von: {{ $name }} (<a href="mailto:{{ $email }}">{{ $email }}</a>)
		<br>Datum/Zeit: {{ date('d.m.Y H:i') }}
	</div>
	<div style="margin: 20px 40px;">
		<small>Betreff:</small>
		<br><strong>{{ $subject }}</strong>
	</div>
</div>
<div>
	<em style="color: #0a84ff;">Mit Nachricht &gt;&gt;&gt;</em>
</div>
<div style="padding: 20px 40px; background: #eaeaea; white-space: pre-wrap">{{ trim($body) }}</div>
<em style="color: #0a84ff;">&lt;&lt;&lt; Ende der Nachricht</em>
</body>
</html>