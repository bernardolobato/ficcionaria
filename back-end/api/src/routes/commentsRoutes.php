<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Model\Comment;
use Validator\CommentValidator;

$app->group('/comments', function () {
    $this->get('', function ($request, $response, $args) {
        $params = $request->getQueryParams();
        try {
            CommentValidator::validParametersSearchList($params);
            $business = $this->get('commentBusiness');
            $data = $business->search($params);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }
    });

    $this->get('/{id}', function ($request, $response, $args) {
        try {
            $id = $args['id'];
            CommentValidator::isValidId($id);
            $business = $this->get('commentBusiness');
            $data = $business->get($id);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }
    });


    $this->post('', function ($request, $response, $args) {
        try {
            $business = $this->get('commentBusiness');
            $entity = Comment::fromArray($request->getParsedBody());
            CommentValidator::addValidator($entity);
            $data = $business->save($entity);
            return $response->withJson($data);
        } catch (Exception\AppException $e) {
            return $response->withJson($e->errors, 401);
        }

    });

    $this->put('', function ($request, $response, $args) {
        try {
            $business = $this->get('commentBusiness');
            $entity = Comment::fromArray($request->getParsedBody());
            CommentValidator::addValidator($entity);
            $data = $business->save($entity);
            return $response->withJson($data);
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }
    });

    $this->delete('/{id}', function ($request, $response, $args) {
        try {
            $id = $args['id'];
            CommentValidator::isValidId($id);
            $business = $this->get('commentBusiness');
            $comment = new Comment();
            $comment->id = $id;
            $data = $business->delete($comment);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (AppException $e) {
            return $response->withJson($e->getMessage(), 401);
        }
    });
});
