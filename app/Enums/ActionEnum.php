<?php

namespace App\Enums;

use Sagar290\PhpTraits\Traits\EnumTraits;

enum ActionEnum: string
{
    use EnumTraits;
    case CREATE_FOLDER = 'create_folder';
    case DELETE_FOLDER = 'delete_folder';
    case DELETE_FILE = 'delete_file';
    case UPLOAD_FILE = 'upload_file';
    case DOWNLOAD_FILE = 'download_file';
    case RENAME_FILE = 'rename_file';
    case RENAME_FOLDER = 'rename_folder';
    case COPY_FILE = 'copy_file';
    case COPY_FOLDER = 'copy_folder';
    case MOVE_FILE = 'move_file';
    case MOVE_FOLDER = 'move_folder';
    case GET_FILE = 'get_file';
    case GET_FOLDER = 'get_folder';
    case GET_FILE_URL = 'get_file_url';
    case GET_FOLDER_URL = 'get_folder_url';
    case GET_FILE_METADATA = 'get_file_metadata';
    case GET_FOLDER_METADATA = 'get_folder_metadata';
    case GET_FILE_SIZE = 'get_file_size';
    case GET_FOLDER_SIZE = 'get_folder_size';
    case GET_FILE_LAST_MODIFIED = 'get_file_last_modified';
    case GET_FOLDER_LAST_MODIFIED = 'get_folder_last_modified';
    case GET_FILE_MIME_TYPE = 'get_file_mime_type';
    case GET_FOLDER_MIME_TYPE = 'get_folder_mime_type';


}
