<?php

namespace App\Http\Controllers;

use App\DataTables\ServerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServerRequest;
use App\Http\Requests\UpdateServerRequest;
use App\Repositories\ServerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ServerController extends AppBaseController
{
    /** @var  ServerRepository */
    private $serverRepository;

    public function __construct(ServerRepository $serverRepo)
    {
        $this->serverRepository = $serverRepo;
    }

    /**
     * Display a listing of the Server.
     *
     * @param ServerDataTable $serverDataTable
     * @return Response
     */
    public function index(ServerDataTable $serverDataTable)
    {
        return $serverDataTable->render('servers.index');
    }

    /**
     * Show the form for creating a new Server.
     *
     * @return Response
     */
    public function create()
    {
        return view('servers.create');
    }

    /**
     * Store a newly created Server in storage.
     *
     * @param CreateServerRequest $request
     *
     * @return Response
     */
    public function store(CreateServerRequest $request)
    {
        $input = $request->all();

        $server = $this->serverRepository->create($input);

        Flash::success('Server saved successfully.');

        return redirect(route('servers.index'));
    }

    /**
     * Display the specified Server.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $server = $this->serverRepository->findWithoutFail($id);

        if (empty($server)) {
            Flash::error('Server not found');

            return redirect(route('servers.index'));
        }

        return view('servers.show')->with('server', $server);
    }

    /**
     * Show the form for editing the specified Server.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $server = $this->serverRepository->findWithoutFail($id);

        if (empty($server)) {
            Flash::error('Server not found');

            return redirect(route('servers.index'));
        }

        return view('servers.edit')->with('server', $server);
    }

    /**
     * Update the specified Server in storage.
     *
     * @param  int              $id
     * @param UpdateServerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServerRequest $request)
    {
        $server = $this->serverRepository->findWithoutFail($id);

        if (empty($server)) {
            Flash::error('Server not found');

            return redirect(route('servers.index'));
        }

        $server = $this->serverRepository->update($request->all(), $id);

        Flash::success('Server updated successfully.');

        return redirect(route('servers.index'));
    }

    /**
     * Remove the specified Server from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $server = $this->serverRepository->findWithoutFail($id);

        if (empty($server)) {
            Flash::error('Server not found');

            return redirect(route('servers.index'));
        }

        $this->serverRepository->delete($id);

        Flash::success('Server deleted successfully.');

        return redirect(route('servers.index'));
    }
}
