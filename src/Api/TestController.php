<?php declare(strict_types = 1);

namespace App\Api;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class TestController
{

	#[Route('/test')]
	public function defaultAction(): Response
	{
		return new Response("Test world!");
	}

}