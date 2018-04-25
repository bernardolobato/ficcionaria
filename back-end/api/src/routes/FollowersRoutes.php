<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Model\Follower;
use Validator\FollowerValidator;

$app->group('/followers', function () {
    $this->get('', function ($request, $response, $args) {
        $params = $request->getQueryParams();
        try {
            FollowerValidator::validParametersSearchList($params);
            $business = $this->get('followerBusiness');
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
            FollowerValidator::isValidId($id);
            $business = $this->get('followerBusiness');
            $data = $business->get($id);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }
    });


    $this->post('', function ($request, $response, $args) {
        try {
            $business = $this->get('followerBusiness');
            $entity = Follower::fromArray($request->getParsedBody());
            FollowerValidator::addValidator($entity);
            $data = $business->save($entity);
            return $response->withJson($data);
        } catch (Exception\AppException $e) {
            return $response->withJson($e->errors, 401);
        }

    });

    $this->put('', function ($request, $response, $args) {
        try {
            $business = $this->get('followerBusiness');
            $entity = Follower::fromArray($request->getParsedBody());
            FollowerValidator::addValidator($entity);
            $data = $business->save($entity);
            return $response->withJson($data);
        } catch (AppException $e) {
            return $response->withJson($e->errors, 401);
        }
    });

    $this->delete('/{id}', function ($request, $response, $args) {
        try {
            $id = $args['id'];
            FollowerValidator::isValidId($id);
            $business = $this->get('followerBusiness');
            $entity = new Follower();
            $entity->id = $id;
            $data = $business->delete($entity);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (AppException $e) {
            return $response->withJson($e->getMessage(), 401);
        }
    });
});
