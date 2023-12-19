<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Product Information</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .form-section {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Product Information</h2>

    <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
            <a class="nav-link active" id="tab1" data-toggle="tab" href="#form1">Customer/Seller Information Form</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#form2">Product Information Form</a>
        </li>
    </ul>

    <div class="tab-content mt-2">
        <div class="tab-pane fade show active" id="form1">
            <div class="form-section">
                <h2 class="text-center mb-4">Customer/Seller Information Form</h2>
        
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="date">Date:</label>
                            <input type="text" class="form-control" id="date" name="date">
        
                            <label for="no">No.:</label>
                            <input type="text" class="form-control" id="no" name="no">
        
                            <label for="city">City:</label>
                            <input type="text" class="form-control" id="city" name="city">
        
                            <label for="mobile">Mobile/Tablets/Ipod:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">
        
                            <label for="brand">Brand:</label>
                            <input type="text" class="form-control" id="brand" name="brand">
        
                            <label for="model">Model:</label>
                            <input type="text" class="form-control" id="model" name="model">
        
                            <label for="color">Color:</label>
                            <input type="text" class="form-control" id="color" name="color">
        
                            <label for="storage">Storage:</label>
                            <input type="text" class="form-control" id="storage" name="storage">
        
                            <label for="ram">Memory RAM:</label>
                            <input type="text" class="form-control" id="ram" name="ram">
        
                            <label for="bodyCondition">Body Condition:</label>
                            <select class="form-control" id="bodyCondition" name="bodyCondition">
                                <option value="A">Full Clean</option>
                                <option value="B">Few Scratches</option>
                                <option value="C">Heavy Dents & Scratches</option>
                            </select>
        
                            <label for="gloss">Gloss:</label>
                            <input type="text" class="form-control" id="gloss" name="gloss">
        
                            <label for="frontGlass">Front Glass:</label>
                            <select class="form-control" id="frontGlass" name="frontGlass">
                                <option value="intact">Intact</option>
                                <option value="broken">Broken</option>
                            </select>
        
                            <label for="lcd">LCD:</label>
                            <input type="text" class="form-control" id="lcd" name="lcd">
        
                            <label for="workingCondition">Protection Working Condition:</label>
                            <select class="form-control" id="workingCondition" name="workingCondition">
                                <option value="fullyFunctional">Fully Functional</option>
                                <option value="batteryIssue">Battery Issue</option>
                                <option value="chargingIssue">Charging Issue</option>
                            </select>
        
                            <label for="frontCamera">Front Camera:</label>
                            <input type="text" class="form-control" id="frontCamera" name="frontCamera">
        
                            <label for="rearCamera">Back Camera:</label>
                            <input type="text" class="form-control" id="rearCamera" name="rearCamera">
        
                            <!-- Add more fields as needed -->
        
                        </div>
                        <div class="col-md-6">
                            <label for="earpiece">Earpiece:</label>
                            <input type="text" class="form-control" id="earpiece" name="earpiece">
        
                            <label for="touchProblem">Touch Problem:</label>
                            <input type="text" class="form-control" id="touchProblem" name="touchProblem">
        
                            <label for="mouthpiece">Mouthpiece/Mic:</label>
                            <input type="text" class="form-control" id="mouthpiece" name="mouthpiece">
        
                            <label for="vibration">Vibration:</label>
                            <input type="text" class="form-control" id="vibration" name="vibration">
        
                            <label for="speakerSound">Speaker Sound:</label>
                            <input type="text" class="form-control" id="speakerSound" name="speakerSound">
        
                            <label for="faceID">Face ID:</label>
                            <input type="text" class="form-control" id="faceID" name="faceID">
        
                            <label for="fingerprintSensor">Fingerprint Sensor:</label>
                            <input type="text" class="form-control" id="fingerprintSensor" name="fingerprintSensor">
        
                            <label for="bluetooth">Bluetooth:</label>
                            <input type="text" class="form-control" id="bluetooth" name="bluetooth">
        
                            <label for="signalDrop">Signal Drop:</label>
                            <input type="text" class="form-control" id="signalDrop" name="signalDrop">
        
                            <label for="cameraDots">Camera Dots:</label>
                            <input type="text" class="form-control" id="cameraDots" name="cameraDots">
        
                            <label for="buttons">Buttons:</label>
                            <input type="text" class="form-control" id="buttons" name="buttons">
        
                            <label for="flashLights">Flashlights:</label>
                            <input type="text" class="form-control" id="flashLights" name="flashLights">
        
                            <label for="rotation">Rotation:</label>
                            <input type="text" class="form-control" id="rotation" name="rotation">
        
                            <label for="other">Other:</label>
                            <input type="text" class="form-control" id="other" name="other">
        
                            <label for="carrierLock">Carrier Lock/Network Lock:</label>
                            <select class="form-control" id="carrierLock" name="carrierLock">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
        
                            <label for="ptaOfficial">PTA Official:</label>
                            <select class="form-control" id="ptaOfficial" name="ptaOfficial">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
        
                            <label for="simWorking">SIM Working:</label>
                            <select class="form-control" id="simWorking" name="simWorking">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
        
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                    </div>
        
                    <!-- Continue adding more rows and columns as needed -->
        
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="form2">
            <div class="form-section">
                <div class="container">
                    <h2 class="text-center mb-4">Product Information Form</h2>
                
                    <div class="form-section">
                        <form>
                            <label for="date">Date:</label>
                            <input type="text" class="form-control" id="date" name="date">
                
                            <label for="no">No.:</label>
                            <input type="text" class="form-control" id="no" name="no">
                
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category">
                                <option value="smartWatch">Smart Watch</option>
                                <option value="accessories">Accessories</option>
                                <option value="parts">Parts</option>
                            </select>
                
                            <label for="companyModel">Company & Model:</label>
                            <input type="text" class="form-control" id="companyModel" name="companyModel" value="Samsung S22 Ultra" readonly>
                
                            <label for="partName">Part Name:</label>
                            <input type="text" class="form-control" id="partName" name="partName">
                
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price">
                
                            <label for="led">Led:</label>
                            <input type="text" class="form-control" id="led" name="led" value="100 USD" readonly>
                
                            <label for="discountPrice">Discount Price:</label>
                            <input type="text" class="form-control" id="discountPrice" name="discountPrice" value="90 USD" readonly>
                
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
