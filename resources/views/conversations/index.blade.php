<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('conversationassets/tailwindcss-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('conversationassets/style.css') }}">
    <title>Chat</title>
</head>

<body>
    <section class="chat-section">
        <div class="chat-container">
            <aside class="chat-sidebar">
                <a href="#" class="chat-sidebar-logo">
                    <i class="ri-chat-1-fill"></i>
                </a>
                <ul class="chat-sidebar-menu">
                    <li class="active" data-section="chats"><a href="#" data-section="Chats" data-title="chats"><i
                                class="ri-chat-3-line"></i></a></li>
                    <li class="chat-sidebar-Contacts" data-section="contacts"><a href="#" data-section="contacts"
                            data-title="Contacts"><i class="ri-contacts-line"></i></a></li>
                    <li class="chat-sidebar-groups">
                        <a href="#" class="chat-sidebar-groups-toggle" data-title="groups">
                            <i class="ri-group-line"></i>
                        </a>
                        <ul class="chat-sidebar-groups-dropdown">
                            <li><a href="#" data-section="create"><i class="ri-add-circle-line"></i> New group</a>
                            </li>
                            <li><a href="#" class="view-groups" data-section="groups"><i class="ri-eye-line"></i>
                                    View groups</a></li>
                        </ul>
                    </li>
                    <li class="chat-sidebar-Documents" data-section="documents"><a href="#"
                            data-section="documents" data-title="documents"><i class="ri-folder-line"></i></a></li>
                </ul>
            </aside>

            <div class="chat-content">
                <div id="chats" class="content-section active">
                    @include('conversations._main')
                </div>
                <div id="contacts" class="content-section">
                    <h2>Contacts</h2>
                    <p>Manage your contacts here.</p>
                </div>
                <div id="create" class="content-section">
                    @include('conversations._main', ['conversations' => $conversations->filter(function ($conv) {
                        return $conv->type === 'group';
                    }),'open_chat' => null])
                    @include('conversations._createGroup')
                </div>
                <div id="groups" class="content-section">
                    @include('conversations._main', ['conversations' => $conversations->filter(function ($conv) {
                        return $conv->type === 'group';
                    }),'open_chat' => null, 'isGroups' => 'yes'])
                </div>
                <div id="documents" class="content-section">
                    <h2>documents</h2>
                    <p>Manage your documents here.</p>
                </div>
            </div>

        </div>
    </section>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('conversationassets/script.js') }}"></script>
</body>

</html>
