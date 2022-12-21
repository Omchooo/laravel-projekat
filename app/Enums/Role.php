<?php

namespace App\Enums;

//php 8.1
enum Role: string
{
    case Admin = 'Admin';
    case Client = 'Client';
}


//php 8 i nize
// class Role
// {
//     public const Admin = 'Admin';
//     public const Client = 'Client';
// }
