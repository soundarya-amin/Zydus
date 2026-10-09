<!-- Edit Patient Modal -->

<div class="modal fade" id="editPatientModal" tabindex="-1" aria-labelledby="editPatientModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="background-color: #f8f2f5;">
			<form method="POST" action="{{ route('admin.patients.update', $patient->ref_id) }}" >
				@csrf
				@method('PUT')

				<div class="modal-header">
					<h5 class="modal-title" id="editPatientModalLabel">Edit Patient</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="full_name" class="form-label">Patient Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $patient->full_name) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="patient_code" class="form-label">Patient Code</label>
                            <input type="text" class="form-control" id="patient_code" name="patient_code" value="{{ old('patient_code', $patient->patient_code) }}" required>
                        </div>
                    </div>

					<div class="mb-3">
						<label for="contact_number" class="form-label">Patient Phone number</label>
						<input type="tel" class="form-control" id="contact_number" maxlength="10" name="contact_number" value="{{ old('contact_number', $patient->contact_number) }}" required>
					</div>

					<div class="mb-3">
						<label for="address" class="form-label">Address</label>
						<textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $patient->address) }}</textarea>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #c3bdbd; border-color: #c3bdbd;">Cancel</button>
					<button type="submit" class="btn btn-primary" style="background-color: #b66dff; border-color: #b66dff;">Save Changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Upload Document Modal -->

<div class="modal fade" id="uploadDocumentsModal" tabindex="-1"
     aria-labelledby="uploadDocumentModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #f8f2f5;">

            <form method="POST"
                  action="{{ route('admin.patients.updateDocuments', $patient->ref_id) }}"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="uploadDocumentsModalLabel">
                        Upload Patient Documents
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <!-- Govt ID -->
                    <div class="mb-4">
                        <label for="govt_id" class="form-label fw-semibold">
                            ID Proof
                        </label>

                        <input type="file"
                               class="form-control"
                               id="govt_id"
                               name="govt_id"
                               accept=".jpg,.jpeg,.png,.pdf">

                        <div class="form-text">
                            Accepted formats: JPG, JPEG, PNG, PDF. Max size: 2 MB.
                        </div>

                        @error('govt_id')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Prescription -->
                    <div class="mb-3">
                        <label for="prescription" class="form-label fw-semibold">
                            Doctor Prescription
                        </label>

                        <input type="file"
                               class="form-control"
                               id="prescription"
                               name="prescription"
                               accept=".jpg,.jpeg,.png,.pdf">

                        <div class="form-text">
                            Accepted formats: JPG, JPEG, PNG, PDF. Max size: 2 MB.
                        </div>

                        @error('prescription')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                            style="background-color: #c3bdbd; border-color: #c3bdbd;">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn btn-primary"
                            style="background-color: #b66dff; border-color: #b66dff;">
                        Save Documents
                    </button>

                </div>

            </form>
        </div>
    </div>
</div>
