<h2>リンクをクリックして、メールアドレスの変更を完了します</h2>
<p>メールアドレスの変更はまだ完了していません。</p>
<p><a href="{{ $linkto }}">ここをクリック</a> するか、次のURLをコピーしてブラウザでアクセスし、メールアドレスの変更を完了してください。</p>

<p><a href="{{ $linkto }}">{{ $linkto }}</a></p>

<ul>
    <li>新しいメールアドレス: {{$usersEmailChange->email}}</li>
    <li>トークン: {{$usersEmailChange->token}}</li>
</ul>

<h2>このメールに心当たりがない場合</h2>
<p>このメールに心当たりがない場合は、<strong>リンクをクリックせずにこのメールを削除してください</strong>。</p>
