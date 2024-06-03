<?php
/**
 * HttpResponseStatus enum for simple Http status code
 */
namespace Aelion\Http\Response;

enum HttpResponseStatus {
    case Ok;
    case Created;
    case NoContent;
    case NotFound;
    case Forbidden;
    case Unauthorized;
    case Conflict;
    case InternalServerError;
}