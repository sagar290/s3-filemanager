<?php

namespace App\Enums;

class ActionEnum
{
    const CREATE_FOLDER = 'create_folder';
    const DELETE_FOLDER = 'delete_folder';
    const DELETE_FILE = 'delete_file';
    const UPLOAD_FILE = 'upload_file';
    const DOWNLOAD_FILE = 'download_file';
    const RENAME_FILE = 'rename_file';
    const RENAME_FOLDER = 'rename_folder';
    const COPY_FILE = 'copy_file';
    const COPY_FOLDER = 'copy_folder';
    const MOVE_FILE = 'move_file';
    const MOVE_FOLDER = 'move_folder';
    const GET_FILE = 'get_file';
    const GET_FOLDER = 'get_folder';
    const GET_FILE_URL = 'get_file_url';
    const GET_FOLDER_URL = 'get_folder_url';
    const GET_FILE_METADATA = 'get_file_metadata';
    const GET_FOLDER_METADATA = 'get_folder_metadata';
    const GET_FILE_SIZE = 'get_file_size';
    const GET_FOLDER_SIZE = 'get_folder_size';
    const GET_FILE_LAST_MODIFIED = 'get_file_last_modified';
    const GET_FOLDER_LAST_MODIFIED = 'get_folder_last_modified';
    const GET_FILE_MIME_TYPE = 'get_file_mime_type';
    const GET_FOLDER_MIME_TYPE = 'get_folder_mime_type';
}
