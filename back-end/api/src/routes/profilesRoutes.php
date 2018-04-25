<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Model\Profile;
use Validator\ProfileValidator;

$app->group('/profiles', function () {
    $this->get('', function ($request, $response, $args) {
        $params = $request->getQueryParams();
        try {
            ProfileValidator::validParametersSearchList($params);
            $business = $this->get('profileBusiness');
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
            ProfileValidator::isValidId($id);
            $business = $this->get('profileBusiness');
            $data = $business->get($id);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (Exception $e) {
            return $response->withJson($e->errors, 401);
        }
    });


    $this->post('', function ($request, $response, $args) {
        try {
            $business = $this->get('profileBusiness');
            $entity = Profile::fromArray($request->getParsedBody());
            ProfileValidator::addValidator($entity);
            $data = $business->add($entity);
            return $response->withJson($data);
        } catch (Exception\AppException $e) {
            return $response->withJson($e->errors, 401);
        }

    });

    $this->put('', function ($request, $response, $args) {
        try {
            $business = $this->get('profileBusiness');
            $entity = Profile::fromArray($request->getParsedBody());
            ProfileValidator::addValidator($entity);
            $data = $business->update($entity);
            return $response->withJson($data);
        } catch (Exception $e) {
            return $response->withJson($e->errors, 401);
        }
    });

    $this->delete('/{id}', function ($request, $response, $args) {
        try {
            $id = $args['id'];
            ProfileValidator::isValidId($id);
            $business = $this->get('profileBusiness');
            $data = $business->delete($id);
            $newResponse = $response->withJson($data);
            return $newResponse;
        } catch (Exception $e) {
            return $response->withJson($e->getMessage(), 401);
        }
    });
});
