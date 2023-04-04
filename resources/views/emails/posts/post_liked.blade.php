<x-mail::message>
# Someone liked your post

{{ '@'. $user->username }} liked on of your post

<x-mail::button url="{{ route('posts.show', $post) }}">
View Post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
