<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Model\Post;
use Validator\PostValidator;
use Exception\AppException;

$app->group('/posts', function () {
    $this->get('', function ($request, $response, $args) {
        $params = $request->getQueryParams();
        $params['textSubstring'] = 50;
        try {
            PostValidator::validParametersSearchList($params);
            $postBusiness = $this->get('postBusiness');
            $data = $postBusiness->search($params);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }
    });

    $this->get('/{id}', function ($request, $response, $args) {
        try {
            $id = $args['id'];
            PostValidator::isValidId($id);
            $postBusiness = $this->get('postBusiness');
            $data = $postBusiness->get($id);
            $data->text = nl2br($data->text);
            if (isset($data->profile)) {
                $data->profile->name;
            }

            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }
    });


    $this->post('', function ($request, $response, $args) {
        try {
            $postBusiness = $this->get('postBusiness');
            $post = $request->getParsedBody();
            $post['profile']['id'] = 1;
            $post = Post::fromArray($post);
            PostValidator::addPostValidator($post);
            $data = $postBusiness->save($post);
            return $response->withJson($data);
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }

    });

    $this->put('', function ($request, $response, $args) {
        try {
            $postBusiness = $this->get('postBusiness');
            $post = Post::fromArray($request->getParsedBody());
            PostValidator::addPostValidator($post);
            $data = $postBusiness->save($post);
            return $response->withJson($data);
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }
    });

    $this->delete('/{id}', function ($request, $response, $args) {
        try {
            $id = $args['id'];
            PostValidator::isValidId($id);
            $postBusiness = $this->get('postBusiness');
            $data = $postBusiness->delete($id);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (AppException $e) {
            return $response->withJson($e->getMessage(), 401);
        }
    });
});
